<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostCategoria extends Model
{
    use Sluggable;
    protected $table = 'blog_post_categoria';
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
