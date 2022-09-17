<?php

namespace Stocks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class ExpenseType extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;


    protected $fillable= [
        'type'
    ];


    public function expense()
    {
        $this->hasMany(Expense::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['type','id']
            ]
        ];
    }
}
