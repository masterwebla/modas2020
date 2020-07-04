<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre','descripcion','imagen'];

    //Relación con Producto
    public function producto(){
    	return $this->hasMany('App\Producto');
    }
}
