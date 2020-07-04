@extends('backoffice.template')
@section('titulo','Listado de Productos')

@section('breadcrumb')
	<div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Productos</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </div>
        <div class="col-md-6 col-4 align-self-center">
           
            <a href="{{ route('productos.create') }}" class="btn pull-right hidden-sm-down btn-success"><i class="mdi mdi-plus-circle"></i> Crear</a>
        </div>
    </div>
@endsection


@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Listado de productos</h4>
					<?php 
						$nombre = null; $categoria_id = null; $estado_id = null;
						if($_GET){
							if(isset($_GET['nombre']))
								$nombre = $_GET['nombre'];
							if(isset($_GET['categoria_id']))
								$categoria_id = $_GET['categoria_id'];
							if(isset($_GET['estado_id']))
								$estado_id = $_GET['estado_id'];
						}
					?>
					<form action="{{ route('productos.index') }}" class="form-inline">
						<input type="text" name="nombre" placeholder="Buscar por nombre..." class="form-control" value="{{$nombre}}">
						<select name="categoria_id" class="form-control">
							<option value="">Seleccionar</option>
							@foreach($categorias as $categoria)
								<option @if($categoria_id==$categoria->id) selected @endif value="{{$categoria->id}}">{{$categoria->nombre}}</option>
							@endforeach
						</select>
						<select name="estado_id" class="form-control">
							<option value="">Seleccionar</option>
							@foreach($estados as $estado)
								<option @if($estado_id==$estado->id) selected @endif value="{{$estado->id}}">{{$estado->nombre}}</option>
							@endforeach
						</select>
						<button class="btn btn-primary"><i class="fa fa-search"></i></button>
						<a class="btn btn-info" href="{{ route('productos.index') }}"><i class="fa fa-refresh"></i></a>
					</form>
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Descripcion</th>
								<th>Categoria</th>
								<th>Estado</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($productos as $producto)
								<tr>
									<td>{{$producto->nombre}}</td>
									<td>${{number_format($producto->precio,0,",",".")}}</td>
									<td>{{$producto->cantidad}}</td>
									<td>{{$producto->descripcion}}</td>
									<td>{{$producto->categoria->nombre}}</td>
									<td>{{$producto->estado->nombre}}</td>
									<td>
										
										<form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<a href="{{ route('imagenes',$producto->id) }}" class="btn btn-warning"><i class="fa fa-image"></i></a>
											<a class="btn btn-info" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-edit"></i></a>
											<button class="btn btn-danger" onclick="return confirm('Desea borrar el producto?')"><i class="fa fa-trash"></i></button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				
			</div>
		</div>
	</div>

@endsection