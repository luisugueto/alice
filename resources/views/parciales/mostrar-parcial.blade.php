@extends('layouts.app')

@section('htmlheader_title')
    Parciales
@endsection
<?php 
        $parcial=buscar($estudiantes->id);
?>

@section('contentheader_title', 'Registro del '.$parcial)


@section('main-content')  
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

      
          <form action="{{ route('parciales.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              Estudiante:<br>
                        {{$estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}<br>
                        <strong>Matrícula Nro: </strong>{{$estudiantes->codigo_matricula}}<br>

                              </h3>
                            </div>
                              <div class="box-body" >
                      @include('parciales.forms.mostrar-parcial-fields')
                    </div>
                      <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">                        
                      <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>        
                      </div>
            </div>                        
                      
           </form> 
           </div>
           </div>
           </section>
           </div>
         
@stop