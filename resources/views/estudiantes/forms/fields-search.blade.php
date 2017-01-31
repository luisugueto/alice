@extends('welcome')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Buscar')

@section('main-content')

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Buscar</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <fieldset>
                        <legend>Estudiante</legend>

                        {!! Form::open(['route' => 'estudiantes.create', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}

                            <div class="control-group">
                                <div class="span5">
                                    <label class="control-label" for="select01">Cédula</label>
                                    <div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                                        <select id="select01" name="nacionalidad" class="chzn-select" style="width: 50px">
                                            <option value="N-">N</option>
                                            <option value="E-">E</option>
                                        </select>

                                        {!! Form::text('cedula', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del estudiante.', 'placeholder' => '25607932']) !!}

                                    </div>
                                </div>
                            </div>

                        {!! Form::hidden('representante', $representante) !!}
                        {!! Form::hidden('padre', $padre) !!}
                        {!! Form::hidden('madre', $madre) !!}

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                            <button type="reset" class="btn">Cancelar</button>
                        </div>

                        {!! Form::close() !!}

                    </fieldset>
                </div>
            </div>
        </div>
    </div>

@endsection
