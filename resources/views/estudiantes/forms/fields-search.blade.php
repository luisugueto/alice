@extends('layouts.app')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Buscar')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Estudiante</h3>
                    </div>

                    {!! Form::open(['route' => 'estudiantes.create', 'method' => 'GET', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box-body">
                        <div class="col-md-4">
                            {!! Form::label('cedula', 'Cédula') !!} <small class="text-red">*</small>

                            <div class="form-group form-inline">
                                <div class="input-group">
                                    <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                                        <select class="form-control" name="nacionalidad" title="Seleccioné la nacionalidad" id="nationality">
                                            <option value="N-">N</option>
                                            <option value="E">E</option>
                                        </select>

                                        {!! Form::text('cedula', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del representante.', 'placeholder' => '25607932', 'size' => '30']) !!}
                                        {!! Form::hidden('representante', $representante) !!}
                                        {!! Form::hidden('padre', $padre) !!}
                                        {!! Form::hidden('madre', $madre) !!}

                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default" id="buscar" title="Buscar">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
