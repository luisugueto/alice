@extends('welcome')

@section('contentheader_title', 'Facturación')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Facturación</div>

        </div>
        <div class="block-content collapse in">
            <div class="span12">

                <fieldset>
                    <legend>{{ $estudiante->nombres.' '.$estudiante->apellidos }}</legend>

                    {!! Form::open(['route' => 'facturaciones.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}
                    
                    @include('facturaciones.forms.fields')

                    {!! Form::close() !!}

                </fieldset>

            </div>
        </div>
    </div>

@endsection
