@extends('layouts.app')

@section('htmlheader_title')
    Docentes
@endsection

@section('contentheader_title', 'Docentes')


@section('main-content')  


            <div class="col-md-12">


    <section class="content">
                                    <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('docentes.asignar.show2',[$docentes->id]) }}'";>
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Asignar</button>
          
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
          <form action="{{ route('docentes.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                            
                              &nbsp;&nbsp;&nbsp;&nbsp;  Docente:{{ $docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres."  C.I.: ".$docentes->cedula }}<br>
                              Lista de Asignaturas y Secciones asignadas
                              
                              </h3>
                            </div>
                              <div class="box-body">
                              
                              @if($docentes->cargo->nombre=="DOCENTE DE PLANTA")
                              <table id="example1" class="table table-bordered table-striped">

                                <thead>
                                <tr>
                                  <th>Curso</th>
                                  <th>Sección</th>
                                  <th>Opciones</th>
                                </tr>
                                </thead>
                              <tbody>
                            |
                              @foreach($docentes->asignaturas as $docentes)
                             <?php $id_seccion=$docentes->pivot->id_seccion; ?>
                              <tr>
                                
                                <td><a href="{{ route('docentes.edit', [$docentes->pivot->id_prof]) }}"> {{$docentes->cursos->curso}}</a></td>
                                <td><a href="{{ route('docentes.edit', [$docentes->pivot->id_prof]) }}">
                                  
                                @foreach($docentes->cursos->seccion as $secciones) 
                                   @if($secciones->id==$id_seccion)
                                    {{$secciones->literal}}
                                    @endif
                                   
                                @endforeach

                                </a></td>
                                
                               <td>
                                <div class="btn-group">
                                                                          
                                      {!!link_to_route('docentes.edit', $title = '', $parameters = $docentes->pivot->id_prof, $attributes = ['class'=>'fa fa-close fa-2x','title' => 'Presione si desea retirar la carga académica','id' => 'desincorporar'])!!}

                                    <br><br>
                                   
                                    
                                </div>
                                </td>
                                
                              </tr>
                             
                             
                              @endforeach
                              </tbody>
                </table>
                @else
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Curso</th>
                  <th>Sección</th>
                  <th>Asignatura</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                     @if($cuantos>0)
                      <?php $docentes2=$docentes; ?>
                      
                @foreach($docentes2->asignaturas as $docentes)
               <?php $id_seccion=$docentes->pivot->id_seccion; ?>

                <tr>
                  
                  <td><a href="{{ route('docentes.edit', [$docentes->pivot->id_prof]) }}"> {{$docentes->cursos->curso}}</a></td>
                  <td><a href="{{ route('docentes.edit', [$docentes->pivot->id_prof]) }}"> {{$docentes->asignatura."(".$docentes->codigo.")"}}</a></td>
                  <td><a href="{{ route('docentes.edit', [$docentes->pivot->id_prof]) }}">
                    
                  @foreach($docentes->cursos->seccion as $secciones) 
                     @if($secciones->id==$id_seccion)
                      {{$secciones->literal}}
                      @endif
                     
                  @endforeach
 
                  </a></td>
                  
                 <td>
                  <div class="btn-group">
                   {{--   {!!link_to_route('docentes.edit', $title = '', $parameters = $docentes->pivot->id_prof, $attributes = ['class'=>'fa fa-close fa-2x','title' => 'Presione si desea retirar la carga académica','id' => 'desincorporar'])!!}
 --}} 
                   
                 <button type="button" class="btn btn-info btn-lg" onclick="codigo({{ $docentes->id }})" data-toggle="modal" data-target="#myModal"> <i class="fa fa-close"></i></button>
                  {{--
                     {!!link_to_route('docentes.show', $title = '', $parameters = $docentes->id, $attributes = ['class'=>'fa fa-calculator fa-2x'])!!} --}}

                      <br><br>
                     
                      
                  </div>
                  </td>
                  
                </tr>
               
               
                @endforeach

                @endif
                </tbody>





                
                
              </table>
                      @endif
                              </div>
                                            
                      

                      </div>
            </div>                        
                      
           </form> 
           </div>
           </div>
           </section>
           </div>

      
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Eliminar Docente</h4>
      </div>
      <div class="modal-body">
        {!! Form::open() !!}
              <input type="text" id="codigo">
        {!! Form::close() !!}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambiod</button>
              </div>
            </div>
    </div>

  </div>
</div>


@stop

<script type="text/javascript">
  
  function codigo(codigo){
    $('#codigo').val(codigo);
  }

  
</script>