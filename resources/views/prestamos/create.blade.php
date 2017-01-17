@extends('welcome')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Prestamos y Anticipos</div>
            </div>
            <div class="block-content collapse in">

                    {!! Form::open(['route' => 'prestamos.store', 'method' => 'POST', 'class'=>'form-horizontal','name' => 'form', 'id' => 'form']) !!}

                        @include('prestamos.forms.fields')

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                        </div>

                    {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
