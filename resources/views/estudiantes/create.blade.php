@extends('welcome')

@section('contentheader_title', 'Estudiante')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Estudiante</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div id="rootwizard">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul class="nav nav-pills">
                                    <li class="active"><a href="#tab1" data-toggle="tab">FOTO</a></li>
                                    <li><a href="#tab2" data-toggle="tab">GENERALES</a></li>
                                    <li><a href="#tab3" data-toggle="tab">PADRE</a></li>
                                    <li><a href="#tab4" data-toggle="tab">MADRE</a></li>
                                    <li><a href="#tab5" data-toggle="tab">MÉDICOS</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['route' => 'estudiantes.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form', 'class' => 'form-horizontal', 'files' => true]) !!}

                        <div id="bar" class="progress progress-striped active">
                            <div class="bar" style="width: 33.3333%;"></div>
                        </div>
                        <div class="tab-content">

                            @include('estudiantes.forms.fields')

                            </div>
                            <ul class="pager wizard">
                                <li class="previous first" style="display:none;"><a href="javascript:void(0);">Primero</a></li>
                                <li class="previous"><a href="javascript:void(0);">Anterior</a></li>
                                <li class="next last" style="display:none;"><a href="javascript:void(0);">Último</a></li>
                                <li class="next"><a href="javascript:void(0);">Siguiente</a></li>
                                <li class="next finish" style="display:none;"><a href="javascript:document.getElementById('form').submit();">Guardar</a></li>
                            </ul>
                        </div>

                        <div class="text-center">
                            <hr>
                            <span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
                        </div><br>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
