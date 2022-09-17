<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public function installement()
    {
        return $this->belongsTo(Installement::class);
    }

    //price, purchase and sales morph one to many relation
    public function notificationable()
    {
        return $this->morphTo();
    }
}
