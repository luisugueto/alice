@extends('layouts.inicio')

@section('content')
                    <div class="col-md-12">

                        <h2 class="titulo">
                            Usuarios
                            <br><small>Datos de los usuarios.</small>
                        </h2>
                        <hr>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <button class="btn btn-primary" title="Registrar personal" onclick="window.location.href = '{{ URL::to('/nuevo_usuario') }}'";>
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Nuevo</button>
                            </div>
                            <div class="col-md-6 text-right">
                                    <div class="form-inline">
                                        <h4 class="buscar">Buscar</h4>
                                        <div class="form-group">
                                           <div class="input-group col-md-12">
                                                <input class="form-control input-sm" placeholder="" type="text" pattern="[A-Z0-9\-]{8,32}" title="Este código sólo puede contener letras mayúsculas, dígitos o guiones." />
                                            </div>
                                        </div>
                                        <span class="fa-stack fa-lg">
                                          <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                          <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Usuario</td>
                                        <td>Rol</td>
                                        <td>Acción</td>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                @foreach($user as $usuario)
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->roles->nombre }}</td>
                                        <td>X</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                             <nav>
                              <ul class="pagination">
                                <li>{{ $user->links() }}
                              </ul>
                            </nav>
                        </div>
                    </div>
@stop