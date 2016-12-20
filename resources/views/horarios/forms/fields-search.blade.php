@extends('layouts.app')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Buscar')

@section('main-content')
<div class="col-md-12"><br><br>
    @include('alerts.request')
    @include('alerts.errors')
    <div class="col-md-12">  
        <section class="content">
            <div class="row">
                {!! Form::open(['route' => 'horarios.create', 'method' => 'GET', 'name' => 'form']) !!}
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> Buscar </h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('cursos', 'Curso') !!} <small class="text-red">*</small>
                                        {!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'id' => 'curso']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('secciones', 'Secciones') !!} <small class="text-red">*</small>
                                        {!! Form::select('id_seccion', ['Seleccione'], null, ['disabled', 'id' => 'seccion', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('asignatura', 'Asignaturas') !!} <small class="text-red">*</small>
                                        {!! Form::select('id_asignatura', ['Seleccione'], null, ['disabled', 'id' => 'asignatura', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('aulas', 'Aulas') !!} <small class="text-red">*</small>
                                        {!! Form::select('id_aula', $aulas, null, ['disabled', 'placeholder' => 'Seleccione', 'id' => 'aula', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-md-12"><br>
                                    <div class="box-footer">
                                        <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                        <button type="submit" class="btn btn-primary pull-right btn-flat">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection