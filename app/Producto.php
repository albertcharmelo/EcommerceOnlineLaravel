<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['categoria_id','referencia','nombre','descripcion','stock','precio','tipo_unidad','garantia','estado','atributo'];
}
