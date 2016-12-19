@extends('layouts.app')

@section('htmlheader_title')
    Nuevo Usuario
@endsection
@section('contentheader_title', 'Usuario')
@section('contentheader_description', 'Nuevo Usuario')

@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    @include('alerts.errors')
                        <h2 class="titulo">
                            Nuevo Usuario
                            <br><small>Ingrese los datos del usuario a registrar.</small>
                        </h2>
                        <hr>
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">
                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Nombre</label>
                                        <div class="input-group col-sm-8">
                                            <input required class="form-control" type="text" name="nombre">
                                        </div>
                                    </div>                                
                        </div>
                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Correo</label>
                                        <div class="input-group col-sm-8">
                                            <input required class="form-control" type="text" name="email">
                                        </div>
                                    </div>                                
                        </div>
                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Contraseña</label>
                                        <div class="input-group col-sm-8">
                                            <input required class="form-control" type="password" name="contraseña">
                                        </div>
                                    </div>                                
                        </div>
                        
                        <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-4">Rol</label>
                                        <div class="input-group col-sm-8">
                                             <select name="roles" required class="form-control select">
                                                 <option  disabled selected>Seleccione</option>
                                                 @foreach($roles as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                                 @endforeach
                                             </select>
                                        </div>
                                    </div>                                   
                        </div>                        
                        <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>
                        </form>
                    </div>
@stop