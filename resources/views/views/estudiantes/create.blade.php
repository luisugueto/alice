@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Registro')

@section('main-content')

	<section class="content">
		<div class="row">
			<div class="col-md-14">
				{!! Form::open() !!}
			  		<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
				  			<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Generales</a></li>
				  			<li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Familiares</a></li>
				  			<li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Medicos</a></li>
				  			<li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Novedades</a></li>
				  			<li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Documentación</a></li>
				  			<li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Facturación</a></li>
				  			<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
						</ul>
						<div class="tab-content">
				 			@include('estudiantes.forms.fields')
						</div>
			  		</div>
			  		{!! Form::close() !!}
			</div>
		</div>
	</section>	

@endsection