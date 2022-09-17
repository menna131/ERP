<?php

namespace Clients\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Clients\Models\ClientWallet;


class Client extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nickname',
        'phone',
        'address',
   

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // relation 1:1 with client_wallet
    //relation 1:1 with sales



/**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }

    public function wallet()
    {
        return $this->hasOne(ClientWallet::class);
    }


}
