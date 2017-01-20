@extends('welcome')

@section('contentheader_title', 'Calificación de Recuperativo')
@section('contentheader_description', 'Recuperativos')

@section('main-content')

<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">CARGAR LA CALIFICACIÓN DEL {{$tipo_recuperativo->tipo}}</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    {!! Form::open(['route' => 'parciales.cargar_recuperativo', 'method' => 'POST', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                            @include('parciales.forms.recuperativos-fields')

                            <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Enviar</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
