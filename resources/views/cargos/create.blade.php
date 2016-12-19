@extends('layouts.app')
@section('contentheader_title', 'Crear Cargo')

@section('htmlheader_title')
    Crear Cargo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!! Form::open(['route' => 'cargos.store', 'method' => 'POST', 'class' => 'form']) !!}
          <br>
          <div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Area', 'Area de Trabajo') !!}
            {!! Form::select('area', $area, null, ['class'=>'form-control']) !!}
          </div>
          <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'fa fa-check fa-2x'])!!}
          </div>
          {!!Form::close()!!}
@stop