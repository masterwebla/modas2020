@extends('backoffice.template')
@section('titulo','Crear Producto')

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
            <a href="{{ route('productos.index') }}" class="btn pull-right hidden-sm-down btn-success">Volver</a>
        </div>
    </div>
@endsection


@section('contenido')
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Crear producto</h4>
					<form action="{{ route('productos.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required="required" placeholder="Ingrese el nombre del producto...">
						</div>
						<div class="form-group">
							<label for="precio">Precio</label>
							<input type="number" name="precio" id="precio" class="form-control" required="required" placeholder="Ingrese el precio del producto...">
						</div>
						<div class="form-group">
							<label for="cantidad">Cantidad</label>
							<input type="number" name="cantidad" id="cantidad" class="form-control" required="required" placeholder="Ingrese la cantidad del producto...">
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción</label>
							<textarea name="descripcion" id="descripcion" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="descripcion_larga">Descripción larga</label>
							<textarea name="descripcion_larga" id="descripcion_larga" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<label for="categoria_id">Categoria</label>
							<select name="categoria_id" id="categoria_id" class="form-control">
								@foreach($categorias as $categoria)
									<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="estado_id">Estado</label>
							<select name="estado_id" id="estado_id" class="form-control">
								@foreach($estados as $estado)
									<option value="{{$estado->id}}">{{$estado->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-success">Guardar</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>

@endsection