@extends('welcome')

@section('contentheader_title', 'Usuario')
@section('contentheader_description', 'Nuevo')

@section('main-content')

<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Usuario</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'role' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                            @include('usuarios.forms.fields')

                            <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Actualizar</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
