@extends('welcome')

@section('contentheader_title', 'Certificado')
@section('contentheader_description', 'Laboral')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Certificado Laboral</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['route' => 'certificados.laboral', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}
                <fieldset>
                        <div class="control-group">
                            {!! Form::label('PERSONAL', 'PERSONAL', ['class'=>'control-label']) !!}
                            <div class="controls">
                                <select name="persona" data-placeholder="SELECCIONE" class="chosen-select" style="width:350px;" tabindex="2">
                                    <option value=""></option>
                                    @foreach($personal as $per)
                                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Imprimir</button>
                        </div>
                    </fieldset>
                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection
