@extends('welcome')

@section('contentheader_title', 'Asistencias')
@section('contentheader_description', 'Archivo')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Asistencia</div>
            </div>
            <div class="block-content collapse in">
                <div class="span4"></div>
                <div class="span4">

                    {!! Form::open(['route' => 'archivo.upload', 'method' => 'POST', 'role' => 'form', 'id' => 'form', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data', 'file' => true]) !!}
                    <div class="form-actions">
                        {!! Form::label('archivo', 'ARCHIVO') !!}
                    </div>


                    <div class="{{ $errors->has('archivo') ? ' has-error' : '' }}">
                        <input type="file" name="archivo" id="archivo" onchange="validar(this.value)" required="required">
                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                        <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
