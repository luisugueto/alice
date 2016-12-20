@extends('layouts.app')
@section('contentheader_title', 'Editar Sección')

@section('htmlheader_title')
    Editar Sección
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($seccion, ['route'=>['secciones.update', $seccion->id], 'method'=>'PUT', 'files'=>false])!!}
          {{ csrf_field() }}
          <br>
          <div class="form-group">
            {!! Form::label('Nombre', 'Literal') !!}
            {!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'form-control','placeholder'=>'Ingresa Literal','title' => 'Ingrese el literal o el número de la sección']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Capacidad', 'Capacidad de Estudiantes') !!}
            {!! Form::number('capacidad', null, ['required','class'=>'form-control', 'placeholder'=>'Ingresa Capacidad']) !!} 
          </div>
          <div class="form-group">
            {!! Form::label('Curso', 'Curso') !!}
            {!! Form::select('id_curso', $cursos,$seccion->id_curso, ['class'=>'form-control','title' => 'Seleccione el curso al cual desea crearle la sección']) !!} 
          </div>
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop