<?php

namespace App\Models;

use App\Http\traits\mediaTrait;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    use Sluggable;
    use mediaTrait;
    use SoftDeletes;

    protected $table = 'brands';

    protected $fillable= [
        'name'
    ];

    protected $hidden = [
        'created_at','updated_at',
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }

    public function products(){
        return $this->hasMany('Stocks\Models\Product','brand_id');
    }
}
