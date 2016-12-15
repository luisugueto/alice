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
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <table class="table table-condensed table-hover">
                                <thead align="center">
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
                                        <td>{!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn btn-primary'])!!}
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