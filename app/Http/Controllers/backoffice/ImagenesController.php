<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\Imagen;

class ImagenesController extends Controller
{
    public function ver($id){
    	$producto = Producto::find($id);
    	$imagenes = Imagen::where('producto_id',$id)->get();
    	return view('backoffice.imagenes.index',compact('producto','imagenes'));
    }

    public function store(Request $request){
    	//Validar los datos
    	$request->validate([
    		'producto_id'=>'required',
    		'imagen'=>'mimes:jpeg,bmp,png'
    	]);

    	//Subir la imagen al servidor
    	$nombreimg = "";
        if($request->file('imagen')){
            $imagen = $request->file('imagen');
            $ruta = public_path().'/imgproductos';
            $nombreimg = $request->producto_id."-".uniqid()."-".$imagen->getClientOriginalName();
            $imagen->move($ruta,$nombreimg);
        }

    	//Insertar los datos en la tabla
    	$imagen = Imagen::create([
    		'imagen'=>$nombreimg,
    		'producto_id'=>$request->producto_id
    	]);

    	return back();
    }

    public function destroy($id){
    	$imagen = Imagen::find($id);
    	$ruta = public_path().'/imgproductos/'.$imagen->imagen;
    	unlink($ruta);

    	$imagen->delete();

    	return back();
    }
}
