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
          <form action="{{ route('personal.store') }}" method="POST">
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