@extends('welcome')

@section('contentheader_title', 'Respaldos')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar Nuevo Usuario" onclick="window.location.href = '{{ URL::to('respaldos/create') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Respaldos</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    {!! Form::open(['route' => 'respaldos.subirRestore', 'method' => 'post', 'class'=>'form-horizontal','name' => 'form', 'id' => 'form', 'files'=> true]) !!}
                   
                    {{ csrf_field() }}
                        <fieldset>
                            <legend>Restaurar Base de Datos</legend>

                            <div class="form-group">
                                {!! Form::label('Archivo', 'Archivo') !!}
                                <input type="file" name="file"> 
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Subir</button>
                                <button type="reset" class="btn">Cancelar</button>
                            </div>
                        </fieldset>
                    </form>

                </div>
                
            </div>
        </div>
    </div>


@endsection
