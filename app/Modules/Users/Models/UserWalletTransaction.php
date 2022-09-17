<?php

namespace Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWalletTransaction extends Model
{
    use HasFactory;
    public $fillable = [
        'user_wallet_id',
        'reason',
        'transaction_date',
        'user_wallet_transactionable_type',
        'user_wallet_transactionable_id',
        'transaction_status',
        'amount',
    ];


    protected $hidden = [
        'created_at','updated_at'
    ];

    //Relations:
    //1-sales
    //2-purchases
    //3-installment
    //4-expenses
    public function transactions()
    {
        return $this->morphTo();
    }
    public function userWallet()
    {
        return $this->belongsTo(UserWallet::class);
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['id']
            ]
        ];
    }
}
