@extends('layouts.app')

@section('contentheader_title', 'Coordinaciones')

@section('contentheader_description', 'Coordinaciones de Cursos')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

         

            <div class="col-xs-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Coordinaciones de Cursos Asignadas</h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                
                                    <table id="example1" class="table table-bordered table-striped dataTable">
                                        <thead>
                                            <tr>
                                                <th>Curso</th>
                                                <th>Sección</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if($cuantos>0)
                                                
													
                                                @foreach($docentes2 as $doc)
                                                    
                                                    <tr>
                                                        <td> {{$doc->curso}}</td>
                                                        <td> {{$doc->literal}}
                                                        </td>
                                                        <td class="text-center">
                                                            {!!link_to_route('parciales.show-estudiantes', $title = '', $parameters = $doc->id, $attributes = ['class'=>'fa fa-eye fa-2x','title' => 'Visualizar estudiantes registrados en la sección'])!!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Carga Académica del Docente</h4>
                    </div>
                    <div class="modal-body">
                        <strong>Seguro desea Retirar la carga académica?</strong>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                        {!!Form::model($docentes, ['route'=>['docentes.update',$docentes->id ], 'method'=>'PUT', 'id'=>'f1', 'name'=>'f1','files'=>false])!!}


                        <input type="hidden" id="codigo" name="codigo">
                        <input type="hidden" id="id_prof" name="id_prof">
                        <input type="hidden" id="id_seccion" name="id_seccion">
                        <input type="hidden" id="id_curso" name="id_curso">

                        <button type="submit" class="btn btn-primary">Aceptar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@stop

<script type="text/javascript">
  
  function codigo(codigo,id_prof,id_seccion,id_curso){
    $('#codigo').val(codigo);
    $('#id_prof').val(id_prof);
    $('#id_seccion').val(id_seccion);
    $('#id_curso').val(id_curso);
  }

  
</script>