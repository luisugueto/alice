@extends('layouts.app')
@section('contentheader_title', 'Crear Area de Trabajo')

@section('htmlheader_title')
    Crear Area de Trabajo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!! Form::open(['route' => 'areas.store', 'method' => 'POST', 'class' => 'form']) !!}
          <br>
          @include('areas.forms.fields')
          <div align="center">
              {!!Form::submit('Aceptar',['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop