<?php

namespace Users\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Permission\Models\Permission AS SpatiePermission;

class Permission extends SpatiePermission
{
    use Sluggable;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    protected $guarded=[];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name','id']
            ]
        ];
    }
}
