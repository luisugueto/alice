@extends('welcome')

@section('contentheader_title', 'Descuentos')
@section('contentheader_description', 'Nuevo')

@section('main-content')

      <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Descuentos por minuto de atraso</div>
            </div>
            <div class="block-content collapse in">                    
                    {!! Form::open(['route' => 'descuentos.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                        @include('descuentos.forms.create-fields')

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Guardar</button>
                        </div>
                    {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection