<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoriaProducto extends Model
{
    use Sluggable;
    protected $table = 'prodcuto_devia_api_categoria';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'categoria'
            ]
        ];
    }
}
