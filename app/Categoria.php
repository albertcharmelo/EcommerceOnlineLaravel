<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['id_padre','codigo','nombre','descripcion','estado','imagen'];
}
