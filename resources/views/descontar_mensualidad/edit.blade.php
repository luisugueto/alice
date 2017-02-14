@extends('welcome')

@section('contentheader_title', 'Descuento en Mensualidad')
@section('contentheader_description', 'Editar')

@section('main-content')

<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Descuento en Mensualidad</div>
            </div>
            <div class="block-content collapse in">

                    {!! Form::model($descuentos, ['route'=>['descontar_mensualidad.update', $descuentos->id], 'method'=>'PUT', 'files' => true, 'class'=>'form-horizontal']) !!}

                        @include('descontar_mensualidad.forms.edit-fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                        </div>

                    {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection