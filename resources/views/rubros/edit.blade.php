@extends('welcome')

@section('contentheader_title', 'Rubro')
@section('contentheader_description', 'Editar')

@section('main-content')

      <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">{{ $rubros->nombre }}</div>
            </div>
            <div class="block-content collapse in">
                    {!!Form::model($rubros, ['route'=>['rubros.update', $rubros->id], 'method'=>'PUT', 'files' => true, 'class'=>'form-horizontal'])!!}

                        @include('rubros.forms.fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Actualizar</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    
@endsection
