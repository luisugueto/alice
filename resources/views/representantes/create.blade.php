@extends('layouts.app')

@section('contentheader_title', 'Representantes')
@section('contentheader_description', 'Registro')

@section('main-content')

	<section class="content">
		<div class="row">
			<div class="col-md-14">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  	<li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="true">Representante</a></li>
					</ul>
					<div class="tab-content">
						@if(!isset($cedula_re))

							{!! Form::open(['route' => 'representantes.cedula', 'method' => 'GET', 'class' => 'form']) !!}

								<div class="tab-pane active" id="tab_1">
									<div class="box-body">
										<div class="col-md-4">
											<div class="form-group{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
												{!! Form::label('cedula_re', 'Cédula') !!} <small class="text-red">*</small>

												<div class="input-group">
													{!! Form::text('cedula_re', null, ['class' => 'form-control', 'id' => 'dni_cedula', 'placeholder' => '1784559969', 'title' => 'Introduzca la cédula del representante']) !!}

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

							{!! Form::close() !!}

							@else
								@if(Session::has('message-error'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                {{Session::get('message-error')}}
                            </div>
                        @endif

								{!! Form::open(['route' => 'representantes.store', 'method' => 'POST', 'class' => 'form']) !!}
					 			
					 				@include('representantes.forms.fields')
								
								{!! Form::close() !!}

					 		@endif
						</div>
				  	</div>
			  	</div>
		</div>
	</section>	

@endsection