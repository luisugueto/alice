@extends('layouts.app')

@section('htmlheader_title')
    Editando Usuario
@endsection


@section('main-content')   
	<div class="col-md-12">
	    @include('alerts.request')


	                        <h2 class="titulo">
	                            Editar Usuario
	                        </h2>
	                        <hr>
		{!!Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'PUT', 'files'=>true])!!}

			@include('usuarios.forms.usuario')
			<div class="form-group" align="center">
			{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
		{!!Form::close()!!}
		<br>
		{!!Form::open(['route'=>['usuarios.destroy', $user->id], 'method'=>'DELETE'])!!}
		<br>
			{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}

		
		</div>
	</div>
          
@stop