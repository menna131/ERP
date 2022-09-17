<?php

namespace App\Http\traits;

trait walletTrait
{
    public function createWalletTransaction(array $transactionData)
    {

        $model = new $this->transactionTable;
        $transactionDataValues = array_values($transactionData);
        // dd($model->fillable,$transactionDataValues);
        $data = array_combine($model->fillable, $transactionDataValues);
        return $model->create($data);
    }


    public function openAccount($model_id)
    {
       return $this->create(['total_paid'=>0,'total_pending'=>0,
       'status'=>1,'number_of_transaction'=>0,'total_value'=>0,'client_id'=>$model_id,
       'supplier_id'=>$model_id, 'user_id'=>$model_id]);
    }


}
