@extends('welcome')

@section('contentheader_title', 'Área')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Área</div>
            </div>
            <div class="block-content collapse in">
                    {!! Form::open(['route' => 'areas.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}

                        @include('areas.forms.fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                        </div>

                    {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
