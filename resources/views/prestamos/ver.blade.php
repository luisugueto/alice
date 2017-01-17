@extends('welcome')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Ver')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Prestamos</div>
            </div>
            <div class="block-content collapse in">
                <div class="span3"></div>
                <div class="span4">

                    {!! Form::open(['route' => 'prestamos.listado', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class'=>'form-horizontal']) !!}

                      <div class="control-group">
                            {!! Form::label('Personal', 'Personal', ['class'=>'control-label']) !!}
                            <div class="controls">
                                <select name="persona" required class="form-control select">
                                    <option  disabled selected>Seleccione</option>
                                    @foreach($personal as $per)
                                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                                    @endforeach
                                </select>
                            </div>
                      </div>
                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Mostrar</button>
                            </div>

                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection
