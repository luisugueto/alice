@extends('welcome')

@section('contentheader_title', 'Empleado')
@section('contentheader_description', 'Nuevo')

@section('main-content')

  <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Tipo de empleado</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    
                    {!! Form::open(['route' => 'tipo_empleado.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        @include('tipo_empleado.forms.create-fields')

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