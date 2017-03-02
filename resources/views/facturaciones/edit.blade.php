@extends('welcome')

@section('contentheader_title', 'Facturación')
@section('contentheader_description', 'Editar')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">FACTURACIÓN</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['route' => ['facturaciones.update', $facturacion->id], 'method' => 'PUT', 'name' => 'form', 'class' => 'form-horizontal']) !!}
                    <fieldset>
                        <legend>{{ $facturacion->factura->estudiante->nombres }} </legend>

                        @include('facturaciones.forms.fields-edit')

                        <div class="span12">
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn">Borrar</button>
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection
