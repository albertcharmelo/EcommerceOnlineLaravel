<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoApi extends Model
{
    protected $table = 'producto_devia_api';
    protected $guarded = [];
    

    /**
     * Get all of the imagenes for the ProductoApi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenes()
    {
        return $this->hasMany(ProductoImagen::class, 'producto_id');
    }

    /**
     * Get the user associated with the ProductoApi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne(CategoriaProducto::class, 'categoria_id');

    }

   
}
