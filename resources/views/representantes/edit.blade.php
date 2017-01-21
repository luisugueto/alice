@extends('welcome')

@section('contentheader_title', 'Representante')
@section('contentheader_description', 'Editar')

@section('main-content')

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Formulario</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <fieldset>
                        <legend>Representante</legend>

                        {!! Form::model($representante, ['route' => ['representantes.update', $representante->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                        @include('representantes.forms.fields-edit')

                        <div class="row-fluid">
                            <div class="span12">
                                <button type="reset" class="btn">Borrar</button>
                                <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </fieldset>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>


@endsection