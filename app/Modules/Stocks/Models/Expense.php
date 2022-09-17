<?php

namespace Stocks\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Stocks\Models\ExpenseType;

class Expense extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    protected $fillable= [
       'expense_Type_id', 'date','value'
    ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['id']
            ]
        ];
    }

    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class);
    }
}
