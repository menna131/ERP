<?php

namespace Stocks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable= [
        'type','create_status','status','discount','receive_date','note','order_date','total','slug','created_at','updated_at'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];

    // m-m with products && clients (2 pivot tables)
}
