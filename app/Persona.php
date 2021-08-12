<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Persona extends Model
{    
    protected $fillable = ['nombre','tipo_documento_id','num_documento','direccion','telefono','email','tipo_persona'];
}
