@extends('welcome')

@section('contentheader_title', 'Docentes')
@section('contentheader_description', 'Cursos')

@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Asignar" onclick="window.location.href = '{{ route('docentes.asignar.show3',[$docentes->id]) }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Asignar
            <?php $id_prof=$docentes->id; ?>
        </button>
    </div>

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">{{ $docentes->apellido_paterno." ".$docentes->apellido_materno.", ".$docentes->nombres."  C.I.: ".$docentes->cedula }}</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
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
                                            <a href="{{ route('docentes.destroy', $doc->id.'/destroy') }}" class="btn btn-danger"><i class="icon-trash icon-white"></i></a>
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