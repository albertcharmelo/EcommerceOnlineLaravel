<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
        protected $guarded = [];
        protected $table = 'facturas_venta';

        
        public function productos()
        {
            return $this->hasMany(Factura_productos::class, 'factura_id');
        }
}
