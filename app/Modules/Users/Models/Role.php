<?php

namespace Users\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Permission\Models\Role AS SpatieRole;

class Role extends SpatieRole
{
    use Sluggable;
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
}