@extends('layouts.app')
@section('contentheader_title', 'Editar Seccion')

@section('htmlheader_title')
    Editar Seccion
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
            {!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Capacidad', 'Capacidad de Alumnos') !!}
            {!! Form::number('capacidad', null, ['required','class'=>'form-control', 'placeholder'=>'Ingresa Capacidad']) !!} 
          </div>
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop