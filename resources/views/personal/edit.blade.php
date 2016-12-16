@extends('layouts.app')
@section('contentheader_title', 'Nuevo Personal')

@section('htmlheader_title')
    Nuevo Personal
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">
      <div class="col-md-14">
          {!!Form::model($personal, ['route'=>['personal.update', $personal->id], 'method'=>'PUT', 'files'=>false])!!}
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#generales" aria-expanded="true">Datos Generales</a></li>
                      <li><a data-toggle="tab" href="#academica" aria-expanded="false">Información Académica</a></li>
                      <li><a data-toggle="tab" href="#remuneracion" aria-expanded="false">Remuneración</a></li>
                      <li class="pull-right"><a href="#" class="text-muted" ><i class="fa fa-gear"></i></a></li>

              
                    </ul>   
                    <div class="tab-content">
                     @include('personal.forms.fields')
                     </div>
                    <div class="form-group" align="center">
                    {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
                  {!!Form::close()!!}
                  <br>
                  {!!Form::open(['route'=>['personal.destroy', $personal->id], 'method'=>'DELETE'])!!}
                  <br>
                    {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                  {!!Form::close()!!}
@stop