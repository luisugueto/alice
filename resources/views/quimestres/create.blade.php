@extends('welcome')

@section('contentheader_title', 'Quimestre')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Quimestre</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['route' => 'quimestres.store', 'method' => 'POST', 'name' => 'f1', 'id' => 'f1', 'class' => 'form-horizontal    ']) !!}
                    <fieldset>
                        <legend>Nuevo</legend>

                        @include('quimestres.forms.create-fields')

                        <div class="span12 text-center">
                            <div class="form-actions">
                                <button type="reset" class="btn btn-primary">Borrar</button>
                                <button type="submit" class="btn">Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

