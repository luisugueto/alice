@extends('welcome')

@section('contentheader_title', 'Representante')
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
                        <legend>Representante</legend>

                        {!! Form::open(['route' => 'representantes.create', 'method' => 'GET', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal']) !!}

                            <div class="control-group">
                                <div class="span5">
                                    <label class="control-label" for="select01">Cédula</label>
                                    <div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                                        <select id="select01" name="nacionalidad" class="chzn-select" style="width: 50px">
                                            <option value="N-">N</option>
                                            <option value="E-">E</option>
                                        </select>

                                        {!! Form::text('cedula_re', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del representante.', 'placeholder' => '25607932', 'size' => '30']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="span5">
                                    <label class="control-label" for="select01">Padre</label>
                                    <div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                                        <select id="select01" name="nacionalidad_pa" class="chzn-select" style="width: 50px">
                                            <option value="N-">N</option>
                                            <option value="E-">E</option>
                                        </select>

                                        {!! Form::text('cedula_pa', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del padre.', 'placeholder' => '25607932', 'size' => '30']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="span5">
                                    <label class="control-label" for="select01">Madre</label>
                                    <div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                                        <select id="select01" name="nacionalidad_ma" class="chzn-select" style="width: 50px">
                                            <option value="N-">N</option>
                                            <option value="E-">E</option>
                                        </select>

                                        {!! Form::text('cedula_ma', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula de la madre.', 'placeholder' => '25607932', 'size' => '30']) !!}
                                    </div>
                                </div>
                            </div>

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