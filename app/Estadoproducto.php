<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadoproducto extends Model
{
    protected $table = 'estadoproductos';
    protected $fillable = ['nombre'];

    //Relación con Producto
    public function productos(){
    	return $this->hasMany('App\Producto');
    }
}
