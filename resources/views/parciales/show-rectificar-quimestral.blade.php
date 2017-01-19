@extends('welcome')

@section('contentheader_title', 'Calificación Quimestral')
@section('contentheader_description', 'Rectificación')

@section('main-content')

<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Rectificación de Calificación de Quimestre</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    {!! Form::open(['route' => 'parciales.rectificacion2', 'method' => 'POST', 'role' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                            @include('parciales.forms.rectificacion2-fields')

                            <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Actualizar</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
    