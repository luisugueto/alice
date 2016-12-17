@extends('layouts.app')
@section('contentheader_title', 'Editar IESS')

@section('htmlheader_title')
    Editar IESS
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-14">
          {!!Form::model($iess, ['route'=>['iess.update', $iess->id], 'method'=>'PUT', 'files'=>false])!!}
          
          <div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['class'=>'form-control', 'disabled','placeholder'=>'Ingresa Nombre']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Email', 'Valor') !!}
            {!! Form::text('valor', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Correo']) !!} 
          </div>
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop