@extends('layouts.app')

@section('htmlheader_title')
    Quimestres
@endsection

@section('contentheader_title', 'Quimestres')


@section('main-content')  

 
            <div class="col-md-12">

    <section class="content">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
    @include('alerts.request') 
    <div class="row">
      <div class="col-md-12">
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
                  <td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->periodos->nombre}}({{$quimestres->periodos->status}})</a></td>
                  
                 <td>
                  <div class="btn-group">
                     {!!link_to_route('quimestres.edit', $title = '', $parameters = $quimestres->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}

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