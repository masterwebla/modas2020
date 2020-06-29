<?php

namespace App\Http\Controllers\backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Estadoproducto;

class ProductosController extends Controller
{
    //Función para listar productos
    public function index()
    {
        $productos = Producto::all();
        return view('backoffice.productos.index',compact('productos'));
    }

    //Formulario para crear un producto
    public function create()
    {
        $categorias = Categoria::all();
        $estados = Estadoproducto::all();
        return view('backoffice.productos.crear',compact('categorias','estados'));
    }

    //Guardar los productos
    public function store(Request $request)
    {
        //PASO 1: Validar los campos
        $request->validate([
            'nombre' => 'required|unique:productos|max:100',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'estado_id' => 'required'
        ]);

        //PASO 2: Insertar la info en la tabla Producto
        $producto = Producto::create([
            'nombre'=>$request->nombre,
            'precio'=>$request->precio,
            'cantidad'=>$request->cantidad,
            'descripcion'=>$request->descripcion,
            'descripcion_larga'=>$request->descripcion_larga,
            'categoria_id'=>$request->categoria_id,
            'estado_id'=>$request->estado_id
        ]);

        return redirect()->route('productos.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $estados = Estadoproducto::all();
        return view('backoffice.productos.editar',compact('producto','categorias','estados'));
    }

    
    public function update(Request $request, $id)
    {
        //PASO 1: Validar los campos
        $request->validate([
            'nombre' => 'required|max:100',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
            'descripcion' => 'required',
            'categoria_id' => 'required',
            'estado_id' => 'required'
        ]);

        //Actualizar los datos en la BD
        $producto = Producto::find($id);
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;
        $producto->descripcion = $request->descripcion;
        $producto->descripcion_larga = $request->descripcion_larga;
        $producto->categoria_id = $request->categoria_id;
        $producto->estado_id = $request->estado_id;
        $producto->save();

        return redirect()->route('productos.index');
    }

    //Borrar producto
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
