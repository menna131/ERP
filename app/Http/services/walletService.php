<?php
/**
 * Pre-steps to use this service:
 * 1) use walletTrait in the wallet model
 * 2) fillable array in the wallet transaction must be in this order:
 *     'model_wallet_id','reason','transaction_date', 'model_wallet_transactionable_type',
 *     'model_wallet_transactionable_id','transaction_status','amount',
 * */
namespace App\Http\services;

use Clients\Models\ClientWallet;
use Illuminate\Support\Facades\DB;
use Suppliers\Models\SupplierWallet;
use Users\Models\UserWallet;

class walletService
{
    /**
     * @var constants for transaction reasons
     */
    private const deposite = 1; //
    private const debit = 2; //
    private const withdraw = 3; // if wallet balance > 0
    private const paymentOut = 4; // if wallet balance < 0
    private const paymentIn = 5;

    /**
     * @var constants for Error handling
     */
    private const DBERROR = 0;
    private const transactionCompeleted = 1;
    private const noInstallments = 2;
    private CONST paidMoreDue = 3;
    private CONST noMoney = 4;

    private $errorCode;

    /**
     * @param object model
     * @param int wallet owner id
     * @return object new wallet
     * / */
    public function createWallet(object $model, int $relatedModelId): object
    {
        return $model->openAccount($relatedModelId);
    }

    /**
     * @param object model
     * @param int wallet id
     * @return float wallet balance
     * / */
    public function getBalance(object $model): float
    {
        return $model->total_value;
    }
    /**
     * @param object model
     * @param array transaction data
     * @param const reason
     * @return self
     * / */
    public function deposite(object $model, array $transactionData,$reason = self::deposite): self
    {
        $this->errorCode =  $this->makeTransaction($model, $transactionData, $reason);
        return $this;
    }
        /**
     * @param object model
     * @param array transaction data
     * @param const reason
     * @return self
     * / */
     public function withdraw(object $model, array $transactionData,$reason = self::withdraw): self
     {

        $this->withdrawValidation($model,$transactionData);
         if(empty($this->errorCode) || $this->errorCode == self::transactionCompeleted){
            $transactionData['amount'] *= -1;
            $this->errorCode =  $this->makeTransaction($model,$transactionData, $reason);

         }
         return $this;
     }
    /**
     * @param object model
     * @param array transaction data
     * @return self
     * / */
    public function debit(object $model, array $transactionData): self
    {
        $this->deposite($model,$transactionData,self::debit);
        return $this;
    }
    /**
     * @param object user source model
     * @param int source wallet id
     * @param array transaction data
     * @param object supplier destination model
     * @param int destination wallet id
     * @return self
     * / */
    public function paymentOut(UserWallet $userModel, array $transactionData,SupplierWallet $supplierModel)
    {
        $this->paymentOutValidation($userModel, $transactionData, $supplierModel);
        if(empty($this->errorCode)){
            DB::beginTransaction();
            $this->withdraw($userModel,$transactionData,self::paymentOut);
            if($this->errorCode == 1){
                $this->withdraw($supplierModel,$transactionData,self::paymentOut);
                if($this->errorCode == 1){
                    DB::commit();
                }else{
                    DB::rollBack();
                }
            }else{
                DB::rollBack();
            }
        }
        return $this;
    }
    public function paymentIn(UserWallet $userModel, array $transactionData,ClientWallet $clientModel): self
    {

        $this->paymentInValidation($transactionData, $clientModel);

        if(empty($this->errorCode)){
            DB::beginTransaction();
            $this->withdraw($clientModel,$transactionData,self::paymentIn);
            if($this->errorCode == 1){
                $this->deposite($userModel,$transactionData,self::paymentIn);
                if($this->errorCode == 1){
                    DB::commit();
                }else{
                    DB::rollBack();
                }
            }else{
                DB::rollBack();
            }

        }
        return $this;
    }


    /**
     * @param object model
     * @param array transaction data
     * @return self
     * / */
    public function makeTransaction(object $model, array $transactionData, $reason): int
    {

        return DB::transaction(function () use ($model,  $transactionData, $reason) {
            try {
                $wallet = $model->findOrFail($model->id);
                $model->createWalletTransaction([
                    'wallet_id' => $model->id,
                    'reason' => $reason,
                    'transaction_date'=>$transactionData['date'],
                    'model_type' => $transactionData['model_type'],
                    'model_id' => $transactionData['model_id'],
                    'transaction_status' => 1,
                    'amount' => $transactionData['amount']
                ]);
                $model->where('id', $model->id)->update(['total_value' => $wallet->total_value + $transactionData['amount'], 'number_of_transaction' => $wallet->number_of_transaction + 1]);
                return self::transactionCompeleted;
            } catch (\Exception $e) {
                return self::DBERROR;
                // dd($e->getMessage());
            }
        });
    }


    public function responeHandle()
    {
        switch ($this->errorCode) {
            case 0:
                return ["error"=> __("translation.Messages.Error.Something Wrong")];
            case 1:
                return ["success"=> __("translation.Messages.Success.Transaction Completed")];
            case 2:
                return ["error"=> __("translation.Messages.Error.No Installments")];
            case 3:
                return ["error"=> __("translation.Messages.Error.Amount Due")];
            case 4:
                return ["error"=> __("translation.Messages.Error.No Money")];
            default:
                return $this->errorCode;
        }
    }

    public function withdrawValidation(object $model,$transactionData)
    {
        $balance = $this->getBalance($model);
        if ($balance <= 0 || $balance < $transactionData['amount']) {
           $this->errorCode =  self::noMoney;
        }
    }

    public function paymentInValidation(array $transactionData,ClientWallet $clientModel)
    {
        $clientModelBalance = $this->getBalance($clientModel);
        if ($clientModelBalance <= 0 ) {
            $this->errorCode =  self::noInstallments;
        }
        if ($transactionData['amount'] > $clientModelBalance) {
            $this->errorCode =  self::paidMoreDue;
        }
    }

    public function paymentOutValidation(UserWallet $userModel, array $transactionData,SupplierWallet $supplierModel)
    {
        $userModelBalance = $this->getBalance($userModel);
        $supplierModelBalance = $this->getBalance($supplierModel);
        if ($userModelBalance <= 0 || $transactionData['amount'] > $userModelBalance) {
            $this->errorCode =  self::noMoney;
        }
        if( $supplierModelBalance <= 0){
            $this->errorCode =  self::noInstallments;
        }
        if( $transactionData['amount'] > $supplierModelBalance){
            $this->errorCode =  self::paidMoreDue;
        }
    }
}
