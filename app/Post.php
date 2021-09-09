<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;

    protected $table = 'blog_post';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titulo'
            ]
        ];
    }
    public function categoria()
    {
        return $this->belongsTo(PostCategoria::class, 'categoria_id');
    }
}
