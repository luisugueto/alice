@extends('layouts.app')

@section('htmlheader_title')
    Docentes
@endsection

@section('contentheader_title', 'Docentes')


@section('main-content')
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                    <form action="{{ route('docentes.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              &nbsp;&nbsp;&nbsp;&nbsp;  Listado de Docentes
                              </h3>
                            </div>
                              <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombres</th>
                  <th>Cédula</th>
                  <th>Tipo</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($docentes as $docentes)
                @if($docentes->cargo->empleado->tipo_empleado=="DOCENTE")
                <tr>
                  
                  <td> {{$docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres}}</td>
                  <td> {{$docentes->cedula}}</td>
                  <td> {{$docentes->cargo->nombre}}</td>
                  
                 <td>
                  <div class="btn-group">
                  
                    

                     {!!link_to_route('docentes.show', $title = '', $parameters = $docentes->id, $attributes = ['class'=>'fa fa-eye fa-2x'])!!} 

                      <br><br>
                     
                      
                  </div>
                  </td>
                  
                </tr>
                @endif
               
                @endforeach
                </tbody>
                
              </table>
                      
                              </div>
                                            
                      

                      </div>
            </div>                        
                      
           </form> 
 

@stop