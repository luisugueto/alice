@extends('welcome')

@section('contentheader_title', 'Tipo de Empleados')
@section('contentheader_description', '')

@section('main-content')

      <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">{{ $tipo_empleado->nombre }}</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    

                    {!!Form::model($tipo_empleado, ['route'=>['tipo_empleado.update', $tipo_empleado->id], 'method'=>'PUT', 'files'=>false, 'class'=>'form-horizontal'])!!}

                        @include('tipo_empleado.forms.edit-fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection