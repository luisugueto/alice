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
                        @include('usuarios.forms.fields')                     
                        <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>
                        </form>
                    </div>
@stop