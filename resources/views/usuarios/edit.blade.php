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

			<div class="form-group">
				{!! Form::label('Nombre', 'Nombre') !!}
				{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Nombre']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Email', 'Email') !!}
				{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Correo']) !!} 
			</div>
			<div class="form-group">

				{!! Form::label('Roles', 'Roles') !!}
				{!! Form::select('roles_id', $roles, null, ['class'=>'form-control']) !!}
			</div> 
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