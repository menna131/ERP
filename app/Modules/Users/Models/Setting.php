<?php

namespace Users\Models;

use App\Http\traits\mediaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, mediaTrait;

    protected $fillable = [
        'name','phone','image','open_account','preferred_language','preferred_theme', 'status'
    ];

}
