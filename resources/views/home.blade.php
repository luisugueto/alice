@extends('welcome')

@section('contentheader_title', 'Tablero')
@section('contentheader_description', 'Inicio')

@section('main-content')

    @if(Auth::user()->roles_id == 1)

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

                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">ESTADÍSTICA ANUAL DE POBLACIÓN</div>
                        </div>
                        <div class="block-content collapse in">
                            TOTAL DE CAPACIDAD <span class="badge badge-info pull-right"> {{ $suma-$estudiante  }} </span>
                            <div class="progress progress-striped active">
                                <div style="width: {{ ($activos/$suma)*100  }}%;" class="bar"></div>
                            </div>
                            MATRICULADOS ACTIVOS <span class="badge badge-success pull-right"> {{ $activos }} </span>
                            <div class="progress progress-striped progress-success active">
                                <div style="width: {{ ($activos/$suma)*100  }}%;" class="bar"></div>
                            </div>
                            MATRICULADOS DESERTADOS <span class="badge badge-warning pull-right"> {{ $suma-$activos }} </span>
                            <div class="progress progress-striped progress-warning active">
                                <div style="width: {{ (($suma-$activos)/$suma)*100 }}%;" class="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span5">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">TAREA COMUNES (ACCESO RÁPIDO)</div>
                        </div>
                        <div class="block-content collapse in">
                            <li><a href="{{ route('docentes.index') }}">LISTADO DE DOCENTES</a></li>
                            <li><a href="{{ route('personal.index') }}">LISTADO DEL PERSONAL</a></li>
                            <li><a href="{{ route('estudiantes.index') }}">LISTADO DE ESTUDIANTES</a></li>
                            <li><a href="{{ url('personal/control_de_pagos') }}">CONTROL DE PAGOS MENSUAL</a></li>
                            <li><a href="{{ url('facturaciones') }}">LISTADO TOTAL DE FACTURACIONES</a></li>
                            <li><a href="#">LISTADO DEL MES ACTUAL DE FACTURACIONES</a></li>
                            <li><a href="{{ url('verificarPrestamos') }}">VERIFICAR PRÉSTAMO</a></li>
                            <li><a href="{{ url('/prestamosTotal') }}">LISTADO TOTAL DE PRESTAMOS</a></li>
                            <li><a href="{{ route('prestamos.index') }}">LISTADO TOTAL DE PRESTAMOS DEL MES ACTUAL</a></li>
                        </div>
                    </div>
                </div>

                <div class="span3">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">DATOS DE INSTITUCIÓN</div>
                        </div>
                        <div class="block-content collapse in">
                            <span class="help-inline" for="inputError" style="color:red;">PERIODO LECTIVO {{ Session::get('periodoNombre') }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif

@endsection