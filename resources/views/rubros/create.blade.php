@extends('welcome')

@section('contentheader_title', 'Rubro')
@section('contentheader_description', 'Nuevo')

@section('main-content')

      <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Rubro</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    

                    {!! Form::open(['route' => 'rubros.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}

                        @include('rubros.forms.fields')

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
