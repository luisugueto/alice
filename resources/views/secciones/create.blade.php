@extends('layouts.app')
@section('contentheader_title', 'Crear Sección')

@section('htmlheader_title')
	Crear Sección
@endsection


@section('main-content')   

	<div class="col-md-12">
		@include('alerts.request')
		<section class="content">
			<div class="row">
		  		<div class="col-md-12">
					{!! Form::open(['route' => 'secciones.store', 'method' => 'POST', 'class' => 'form']) !!}	
					  	@include('secciones.forms.fields')
					  	<div align="center">
						  	{!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
					  	</div>
					{!! Form::close() !!}
				</div>
			</div>
		</section>
	</div>

@endsection