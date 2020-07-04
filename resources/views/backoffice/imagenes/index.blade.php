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
            <a href="{{ route('productos.index') }}" class="btn pull-right hidden-sm-down btn-success">Volver</a>
        </div>
    </div>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-block">
					<h4 class="card-title">Imágenes del producto {{$producto->nombre}}</h4>
					<div class="row text-center">
						<div class="col-12 text-center">
							<form action="{{ route('img-guardar') }}" method="POST" enctype="multipart/form-data" class="form-inline">
								@csrf
								<input type="hidden" name="producto_id" value="{{$producto->id}}">
								<input type="file" name="imagen" class="form-control" accept="image/*">
								<button class="btn btn-success"><i class="fa fa-save"></i></button>
							</form>
						</div>
					</div>
					<hr>
					<div class="row">
						@foreach($imagenes as $imagen)
							<div class="col-md-3">
								<div class="card">
									<img class="card-img-top" src="{{asset('imgproductos/'.$imagen->imagen)}}" alt="Card image" style="height: 300px">
									<div class="card-body text-center">
									    <h4 class="card-title">{{$producto->nombre}}</h4>
									    <form action="{{ route('img-borrar',$imagen->id) }}" method="POST">
									    	@csrf
									    	@method('delete')
									    	<button class="btn btn-danger" onclick="return confirm('Desea borrar la imagen?')"><i class="fa fa-trash"></i></button>
									    </form>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				
			</div>
		</div>
	</div>

@endsection