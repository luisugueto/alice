@extends('layouts.app')

@section('contentheader_title', 'Representante')
@section('contentheader_description', 'Buscar')

@section('main-content')

<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 20px;">
            @include('alerts.request')
            @include('alerts.errors')
        </div>
    </div>

    <section class="content"> 
        <div class="row">
            <div class="col-md-12">         

                {!! Form::open(['route' => 'representantes.create', 'method' => 'GET', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Representante</h3>
                        </div>
                        <div class="box-body">
                            <div class="col-md-4">
                                
                                {!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>

                                <div class="form-group form-inline">
                                    <div class="input-group">
                                        <div class="form-group{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                                            <select class="form-control" name="nacionalidad" title="Seleccioné la nacionalidad" id="nationality">
                                                <option value="N-">N</option>
                                                <option value="E">E</option>
                                            </select>           

                                            {!! Form::text('cedula_re', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del representante.', 'placeholder' => '25607932', 'size' => '30']) !!}

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default" id="buscar" title="Buscar">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>  

                            </div>
                            <div class="col-md-4">
                                
                                {!! Form::label('cedula', 'Padre')!!}

                                <div class="form-group form-inline">
                                    <div class="input-group">
                                        <div class="form-group">
                                            <select class="form-control" name="nacionalidad_pa" title="Seleccioné la nacionalidad" id="nationality">
                                                <option value="N-">N</option>
                                                <option value="E">E</option>
                                            </select>           

                                            {!! Form::text('cedula_pa', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del padre.', 'placeholder' => '25607932', 'size' => '30']) !!}

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default" id="buscar" title="Buscar">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>  

                            </div>
                            <div class="col-md-4">
                                
                                {!! Form::label('cedula', 'Madre')!!}

                                <div class="form-group form-inline">
                                    <div class="input-group">
                                        <div class="form-group">
                                            <select class="form-control" name="nacionalidad_ma" title="Seleccioné la nacionalidad" id="nationality">
                                                <option value="N-">N</option>
                                                <option value="E">E</option>
                                            </select>           

                                            {!! Form::text('cedula_ma', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del madre.', 'placeholder' => '25607932', 'size' => '30']) !!}

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-default" id="buscar" title="Buscar">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>  

                            </div>
                            <div class="col-md-12">
                                <div class="box-footer">
                                    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                    <button type="submit" class="btn btn-primary pull-right btn-flat">Buscar</button>
                                </div>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </section>
</div>

@endsection