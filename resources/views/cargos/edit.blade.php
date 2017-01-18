@extends('welcome')

@section('contentheader_title', 'Cargos')
@section('contentheader_description', 'Editar')

@section('main-content')

<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cargo {{ $cargo->nombre }}</div>
            </div>
            <div class="block-content collapse in">

                    {!! Form::model($cargo, ['route'=>['cargos.update', $cargo->id], 'method'=>'PUT', 'files' => true, 'class'=>'form-horizontal']) !!}

                        @include('cargos.forms.fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                        </div>

                    {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection