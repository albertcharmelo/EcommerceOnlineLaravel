<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    protected $table = 'compras';

    protected $fillable = [
        'proveedor_id',
        'user_id',
        'tipo_identificacion',
        'num_compra',
        'fecha_compra',
        'impuesto',
        'total',
        'estado',
    ];

    /* El usuario que hace el registro*/
    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    /* El proveedor que hace la compra*/
    public function proveedor()
    {
        return $this->belongsTo('App\Persona');
    }

}
