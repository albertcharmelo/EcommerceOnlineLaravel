<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura_productos extends Model
{
    protected $guarded = [];
    protected $table = 'facturas_productos';

    public function producto()
    {
        return $this->hasOne(ProductoApi::class, 'producto_id', 'id');
    }
}
