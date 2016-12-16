@extends('layouts.app')

@section('htmlheader_title')
    Nuevo Usuario
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
                        <h2 class="titulo">
                            Nuevo Personal
                        </h2>
                        <hr>
                    <form action="{{ route('personal.store') }}" method="POST">

                    <ul class="nav nav-tabs">
                      <li class="active li"><a data-toggle="tab" href="#generales">Datos Generales</a></li>
                      <li class="li"><a data-toggle="tab" href="#medicos">Datos Médicos</a></li>
                      <li class="li"><a data-toggle="tab" href="#academica">Información Académica</a></li>
                      <li class="li"><a data-toggle="tab" href="#remuneracion">Remuneración</a></li>
                      <li class="li"><a data-toggle="tab" href="#familiares">Datos Familiares</a></li>
                      <li class="li"><a data-toggle="tab" href="#laboral">Historial Laboral Interno</a></li>
                      <li class="li"><a data-toggle="tab" href="#file">File Personal</a></li>
                      <li class="li"><a data-toggle="tab" href="#anticipos">Anticipos</a></li>
                      <li class="li"><a data-toggle="tab" href="#permisos">Permisos</a></li>
                      <li class="li"><a data-toggle="tab" href="#digitales">Digitales</a></li>
                      <li class="li"><a data-toggle="tab" href="#notas">Notas</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="generales" class="tab-pane fade in active">
                        <h3>Datos Generales</h3><br>
                        Codigo Personal: <input type="text" required class="form-control">
                      </div>
                      <div id="medicos" class="tab-pane fade">
                        <h3>Datos Médicos</h3>
                        <input type="text" required>
                      </div>
                      <div id="academica" class="tab-pane fade">
                          <h3>Información Académica</h3>
                          <input type="text" required>
                      </div>
                      <div id="remuneracion" class="tab-pane fade">
                          <h3>Remuneración</h3>
                          <input type="text" required>
                      </div>
                      <div id="familiares" class="tab-pane fade">
                          <h3>Datos Familiares</h3>
                          <input type="text" required>
                      </div>
                      <div id="laboral" class="tab-pane fade">
                          <h3>Historial Laboral Interna</h3>
                          <input type="text" required>
                      </div>
                      <div id="file" class="tab-pane fade">
                          <h3>File Personal</h3>
                          <input type="text" required>
                      </div>
                      <div id="anticipos" class="tab-pane fade">
                          <h3>Anticipos</h3>
                          <input type="text" required>
                      </div>
                      <div id="permisos" class="tab-pane fade">
                          <h3>Permisos</h3>
                          <input type="text" required>
                      </div>
                      <div id="digitales" class="tab-pane fade">
                          <h3>Digitales</h3>
                          <input type="text" required>
                      </div>
                      <div id="notas" class="tab-pane fade">
                          <h3>Notas</h3>
                          <input type="text" required>
                      </div>
                    </div>
                        <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">
                                              
                        <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>
                        </form>
                    </div>
@stop