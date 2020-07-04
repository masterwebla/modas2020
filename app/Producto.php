<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['nombre','precio','descripcion','descripcion_larga','categoria_id',
			'cantidad','estado_id'];


	//Relación con el modelo Categoría
	public function categoria(){
		return $this->belongsTo('App\Categoria');
	}

	//Relación con el modelo Estado
	public function estado(){
		return $this->belongsTo('App\Estadoproducto');
	}

	//función scope para buscar por nombre
	public function scopeNombre($query,$nombre){
		return $query->where('nombre','LIKE',"%$nombre%");
	}

	//función scope para filtrar por categoria
	public function scopeCategoria($query,$categoria_id){
		if($categoria_id)
			return $query->where('categoria_id',$categoria_id);
	}

	//función scope para filtrar por estado
	public function scopeEstado($query,$estado_id){
		if($estado_id)
			return $query->where('estado_id',$estado_id);
	}
}
