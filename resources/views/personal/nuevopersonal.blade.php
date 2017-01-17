@extends('welcome')

@section('contentheader_title', 'Personal')
@section('contentheader_description', 'Nuevo')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Personal</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <div id="rootwizard">
                    <div class="navbar">
                        <div class="navbar-inner">
                            <div class="container">
                                <ul class="nav nav-pills">
                                    <li class="active"><a data-toggle="tab" href="#tab1" aria-expanded="true">Datos Generales</a></li>
                                    <li><a data-toggle="tab" href="#tab2" aria-expanded="false">Información Académica</a></li>
                                    <li><a data-toggle="tab" href="#tab3" aria-expanded="false">Remuneración</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                {!! Form::open(['route' => 'personal.store', 'method' => 'POST', 'name' => 'f1', 'id' => 'f1', 'class'=>'form-horizontal']) !!}
                    <div id="bar" class="progress progress-striped active">
                        <div class="bar" style="width: 33.3333%;"></div>
                    </div>
                    <div class="tab-content">
                                @include('personal.forms.fields')

                    </div>
                                <ul class="pager wizard">
                                    <li class="previous first" style="display:none;"><a href="javascript:void(0);">Primero</a></li>
                                    <li class="previous"><a href="javascript:void(0);">Anterior</a></li>
                                    <li class="next last" style="display:none;"><a href="javascript:void(0);">Último</a></li>
                                    <li class="next"><a href="javascript:void(0);">Siguiente</a></li>
                                    <li class="next finish" style="display:none;"><a href="javascript:document.getElementById('f1').submit();">Guardar</a></li>
                                </ul>
                            </div>

                            <div class="text-center">
                                <hr>
                                <span>CAMPOS OBLIGATORIOS SON MARCADOS CON</span> (<small class="text-red">*</small>)
                            </div><br>

                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection