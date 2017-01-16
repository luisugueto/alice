@extends('welcome')

@section('contentheader_title', 'Tablero')
@section('contentheader_description', 'Inicio')

@section('main-content')

    <div class="span12" id="content">
        <div class="row-fluid">
            <div class="span4">
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">DATOS DE USUARIO ACTUAL</div>
                    </div>
                    <div class="block-content collapse in">
                        <li>{{ strtoupper(Auth::user()->name) }}</li>
                        <li>{{ strtoupper(Auth::user()->roles->nombre) }}</li>
                    </div>
                </div>
            </div>

            <div class="span6">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">TAREA COMUNES (ACCESO RÁPIDO)</div>
                    </div>
                    <div class="block-content collapse in">

                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">

            <div class="span4">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">DATOS DE INSTITUCIÓN</div>
                    </div>
                    <div class="block-content collapse in">
                        <span class="help-inline" for="inputError" style="color:red;">PERIODO LECTIVO {{ Session::get('periodoNombre') }}</span>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">DATOS DE LA APLICACIÓN</div>
                    </div>
                    <div class="block-content collapse in">

                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    </div>

@endsection