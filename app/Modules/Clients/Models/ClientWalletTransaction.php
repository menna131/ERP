<?php

namespace Clients\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Clients\Models\ClientWallet;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Stmt\Switch_;

class ClientWalletTransaction extends Model
{
    use HasFactory, SoftDeletes;

    public $fillable = [
        'client_wallet_id',
        'reason',
        'transaction_date',
        'client_wallet_transactionable_type',
        'client_wallet_transactionable_id',
        'transaction_status',
        'amount',

    ];
    protected $hidden = [];
    
    public function clientWallets()
    {
        return $this->belongsTo(clientWallet::class);
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
}
