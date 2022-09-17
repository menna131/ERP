<?php

namespace Clients\Models;

use Clients\Models\Client;
use Clients\Models\ClientWalletTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\traits\walletTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\interfaces\walletInterface;

class ClientWallet extends Model implements walletInterface
{
    use HasFactory,walletTrait,Sluggable,SoftDeletes;

    protected $fillable = [
        'client_id','total_paid',
        'total_pending','status',
        'number_of_transaction',
        // 'reminder_day',
        'total_value'

    ];



    private $transactionTable = 'Clients\Models\ClientWalletTransaction';


    public function sluggable(): array
    {
        // dd($this->supplier->name);
        return [
            'slug' => [
                'source' => ['client.name','id']
            ]
        ];
    }

    //1:1 with client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function ClientWalletTransactions()
    {
       return $this->hasMany(ClientWalletTransaction::class);
    }
}
