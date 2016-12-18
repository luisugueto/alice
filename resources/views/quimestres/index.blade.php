@extends('layouts.app')

@section('htmlheader_title')
    Quimestres
@endsection

@section('contentheader_title', 'Quimestres')


@section('main-content')  

 
            <div class="col-md-14">

    <section class="content">
    @include('alerts.request') 
    <div class="row">
      <div class="col-md-14">
          <form action="{{ route('quimestres.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              &nbsp;&nbsp;&nbsp;&nbsp;  Listado de Quimestres
                              </h3>
                            </div>
                              <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fech de Inicio</th>
                  <th>Fecha de Fin</th>
                  <th>Número</th>
                  <th>Periodo</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quimestres as $quimestres)
                <tr>
                  
                  <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->inicio}}</a></td>
                  <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->fin}}</a></td>
                  <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->numero}}</a></td>
                  <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->periodos->periodo}}</a></td>
                  
                 <td>
                  <div class="btn-group">
                      <a href="{{ route('quimestres.edit', [$quimestres->id]) }}"><button class="btn btn-default btn-flat" title="Presionando este botón puede editar el registro"><i class="fa fa-pencil"></i></button></a>

                      <a href="{{ route('quimestres.destroy', [$quimestres->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a><br><br>
                     
                      
                  </div>
                  </td>
                  
                </tr>
               
                @endforeach
                </tbody>
                
              </table>
                      
                              </div>
                                            
                      

                      </div>
            </div>                        
                      
           </form> 
           </div>
           </div>
           </section>
           </div>
@stop