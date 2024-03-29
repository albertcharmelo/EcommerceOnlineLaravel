<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lname', 'email', 'password', 'ciudad', 'provincia', 'direccion','rol_id','telefono','RNC','suscriber','referenciaID'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


 
 public function productosCarrito()
 {
     return $this->belongsToMany(ProductoApi::class, 'producto_cart', 'user_id', 'producto_id');
 }


 public function rol()
 {
     return $this->belongsTo(Rol::class);
 }
}
