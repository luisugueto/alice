@extends('layouts.app')

@section('contentheader_title', 'Personal')
@section('contentheader_description', 'Registro')



<<<<<<< HEAD
@section('main-content')           
  @include('alerts.errors')         
            <div class="col-md-12">
=======
@section('main-content')                    
            <div class="col-md-14">
>>>>>>> f23e81b3771bcd7a07a68d9f995886b3a6a8cd25
    <section class="content">
    <div class="row">
      <div class="col-md-14">
          <form action="{{ route('personal.store') }}" method="POST" id="f1" name="f1">
          {{ csrf_field() }}
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
                      <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">                        
                                              
                        <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>
                        </form> 
@stop