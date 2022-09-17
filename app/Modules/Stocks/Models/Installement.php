<?php

namespace Stocks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installement extends Model
{
    use HasFactory;

    public function notification()
    {
        $this->hasMany(Notification::class);
    }

    //price and purchase morph one to one relation
    public function installementable()
    {
        return $this->morphTo();
    }
}
