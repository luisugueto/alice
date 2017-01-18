@extends('welcome')

@section('contentheader_title', 'Horarios')
@section('contentheader_description', 'Buscar')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Horarios</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">

                    {!! Form::open(['route' => 'horarios.create', 'method' => 'GET', 'name' => 'form', 'class'=>'form-horizontal']) !!}


                                <div class="control-group">
                                    {!! Form::label('cursos', 'Curso', ['class'=>'control-label']) !!}
                                    <div class="controls">
                                        {!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'id' => 'curso']) !!}
                                    </div>
                                </div>

                                <div class="control-group">
                                    {!! Form::label('secciones', 'Secciones', ['class'=>'control-label']) !!}
                                    <div class="controls">
                                        {!! Form::select('id_seccion', ['Seleccione'], null, ['disabled', 'id' => 'seccion', 'class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {!! Form::label('asignatura', 'Asignaturas', ['class'=>'control-label']) !!}
                                    <div class="controls">
                                        {!! Form::select('id_asignatura', ['Seleccione'], null, ['disabled', 'id' => 'asignatura', 'class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="control-group">
                                    {!! Form::label('aulas', 'Aulas', ['class'=>'control-label']) !!}
                                    <div class="controls">
                                        {!! Form::select('id_aula', $aulas, null, ['disabled', 'placeholder' => 'Seleccione', 'id' => 'aula', 'class' => 'form-control']) !!}
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-flat">Siguiente</button>
                                </div>



                    {!! Form::close() !!}


            </div>
        </div>
    </div>

         
@endsection