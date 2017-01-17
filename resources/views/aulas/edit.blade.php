@extends('welcome')

@section('contentheader_title', 'Aula')
@section('contentheader_description', 'Editar')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Aula {{ $aula->nombre }}</div>
            </div>
            <div class="block-content collapse in">
                <div class="span3"></div>
                    <div class="span4">
                    {!! Form::model($aula, ['route'=> ['aulas.update', $aula->id], 'method'=>'PUT', 'files' => true, 'class'=>'form-horizontal']) !!}

                        @include('aulas.forms.fields')

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
