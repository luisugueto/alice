@extends('layouts.app')
@section('contentheader_title', 'Editar Asignatura')

@section('htmlheader_title')
    Editar Asignatura
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($asignaturas, ['route'=>['asignaturas.update', $asignaturas->id], 'method'=>'PUT', 'files'=>false])!!}
          
          <br>
          @include('asignaturas.forms.fields')
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          {!! Form::close() !!}
                  <br>
                  {!!Form::open(['route'=>['asignaturas.destroy', $asignaturas['id']], 'method'=>'DELETE'])!!}
                    <br>
                      {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
          </div>
@stop