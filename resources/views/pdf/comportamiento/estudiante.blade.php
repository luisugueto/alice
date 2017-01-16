@extends('layouts.app')

@section('contentheader_title', 'Certificado')
@section('contentheader_description', 'Comportamiento')

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
                        <h3 class="box-title">Certificado Comportamiento</h3>
                    </div>

                    {!! Form::open(['route' => 'certificados.comportamiento', 'method' => 'GET', 'name' => 'form', 'id' => 'form']) !!}

                        <div class="box-body">
                            {!! Form::label('Estudiante', 'Estudiante') !!}

                            <select name="id" required class="form-control select">
								<option  disabled selected>Seleccione</option>
								@foreach($estudiantes as $per)
									<option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
								@endforeach
							</select>

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Mostrar</button>
                            </div>

                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection