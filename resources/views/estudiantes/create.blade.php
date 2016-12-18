@extends('layouts.app')

@section('contentheader_title', 'Estudiantes')
@section('contentheader_description', 'Registro')

@section('main-content')
<div class="col-md-12">
	<section class="content">
		@include('alerts.request') 
		<div class="row">
			<div class="col-md-12">
				@if(!empty($cedula))
					
					{!! Form::open(['route' => 'estudiantes.store', 'method' => 'POST', 'class' => 'form']) !!}
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

				@else 

					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
					  		<li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Generales</a></li>
					  	</ul>
					  	{!! Form::open(['route' => 'estudiantes.cedula', 'method' => 'GET', 'class' => 'form']) !!} {!! Form::hidden('id_representante', $representante->id) !!}
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">
								<div class="box-body">
									<div class="col-md-4">
										<div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
											{!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>

											<div class="input-group">
												{!! Form::text('cedula', null, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559961', 'title' => 'Introduzca la cédula del estudiante']) !!}

												<span class="input-group-btn">
													<button type="submit" class="btn btn-default" id="buscar" title="Buscar">
														<span class="fa fa-search"></span>
													</button>
												</span>
											</div>
										</div> 
									</div>
								</div>
							</div>
						</div>
						</div>
				@endif

			</div>
		</div>
	</section>	
</div>
	
@endsection