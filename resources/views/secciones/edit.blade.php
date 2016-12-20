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
          @include('secciones.forms.fields')
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop