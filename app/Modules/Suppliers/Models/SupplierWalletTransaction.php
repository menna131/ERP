<?php

namespace Suppliers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Suppliers\Models\SupplierWallet;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\Switch_;

class SupplierWalletTransaction extends Model
{
    use HasFactory , SoftDeletes;

    public $fillable = [
        'supplier_wallet_id',
        'reason',
        'transaction_date',
        'supplier_wallet_transactionable_type',
        'supplier_wallet_transactionable_id',
        'transaction_status',
        'amount',

    ];
    public function supplierWallets()
    {
        return $this->belongsTo(SupplierWallet::class);
    }

    // morph relation ( purchase / expenses / installment / sales  )
    public function transactions()
    {
        return $this->morphTo();
    }
    

    public function getReasonAttribute($value)
    {
        switch ($value) {
            case 1:
                return __('translation.walletTransaction.deposite');
            case 2:
                return __('translation.walletTransaction.withdraw');
            case 3:
                return __('translation.walletTransaction.depit');
            case 4:
                return __('translation.walletTransaction.paymentOut');
            case 5:
                return __('translation.walletTransaction.paymentIn');
            default:
                return __('translation.walletTransaction.unknown reason');
        }
    }

    public function getTransactionTypeAttribute($value)
    {
        return $value;

    }

    //Relations:
    //1-sales ('nooo' al supplier msh hy3mel sale)
    //2-purchases 'morph'
    //3-installment 'morph'
    //4-expenses 'morph'
    // public function transactions()
    // {
    //     return $this->morphTo();
    // }
}
