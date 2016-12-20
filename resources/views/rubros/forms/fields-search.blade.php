@extends('layouts.app')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Buscar')

@section('main-content')
<div class="col-md-12"><br><br>
    @include('alerts.request')
    @include('alerts.errors')
    <div class="col-md-12">  
        <section class="content">
            <div class="row">
                {!! Form::open(['route' => 'rubros.create', 'method' => 'GET', 'name' => 'form']) !!}
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> Buscar </h3>
                            </div>
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
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection