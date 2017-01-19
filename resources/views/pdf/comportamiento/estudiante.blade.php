@extends('welcome')

@section('contentheader_title', 'Certificado')
@section('contentheader_description', 'Comportamiento')

@section('main-content')
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Certificado Comportamiento</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['route' => 'certificados.comportamiento', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                <fieldset>
                    <div class="control-group">
                        {!! Form::label('Estudiante', 'Estudiante', ['class'=>'control-label']) !!}

                        <div class="controls">
                            <select name="id" required class="form-control select">
                                <option  disabled selected>Seleccione</option>
                                @foreach($estudiantes as $per)
                                    <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-flat">Imprimir</button>
                    </div>
                </fieldset>
                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection
