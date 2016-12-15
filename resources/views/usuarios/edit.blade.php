@extends('layouts.inicio')

@section('content')
<br>
	{!!Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'PUT', 'files'=>true])!!}
		@include('usuarios.forms.usuario')
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
	{!!Form::close()!!}

	{!!Form::open(['route'=>['usuarios.destroy', $user->id], 'method'=>'DELETE'])!!}
		{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
	{!!Form::close()!!}
@stop