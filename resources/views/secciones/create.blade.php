@extends('layouts.app')
@section('contentheader_title', 'Crear Seccion')

@section('htmlheader_title')
    Crear Seccion
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!! Form::open(['route' => 'secciones.store', 'method' => 'POST', 'class' => 'form']) !!}
          <br>
          <div class="form-group">
            {!! Form::label('Nombre', 'Literal') !!}
            {!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Capacidad', 'Capacidad de Alumnos') !!}
            {!! Form::text('capacidad', null, ['required','class'=>'form-control', 'placeholder'=>'Ingresa Capacidad']) !!} 
          </div>
          <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop