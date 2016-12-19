@extends('layouts.app')
@section('contentheader_title', 'Crear Aula')

@section('htmlheader_title')
    Crear Aula
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!! Form::open(['route' => 'aulas.store', 'method' => 'POST', 'class' => 'form']) !!}
          <br>
          <div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop