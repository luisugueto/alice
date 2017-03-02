@extends('welcome')

@section('contentheader_title', 'Facturaciones')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="col-xs-12">
        <button class="btn btn-primary" title="Registrar facturación" onclick="window.location.href = '{{ URL::to('facturaciones/buscar/estudiante') }}'";>
            <span class="fa fa-plus" aria-hidden="true"></span> Nuevo
        </button>
    </div>

    {!! Form::open(['route' => 'facturaciones.index', 'method' => 'GET']) !!}

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">FILTRO DE BÚSQUEDA</div>
                <div class="pull-right"> <button class="btn" style="margin-top: -5px;"><span class="icon-search"></span></button></div>
            </div>
            <div class="block-content collapse in">
                <div class="table table-responsive">
                    <div class="span12">

                        <div class="control-group">
                            <label> Periodo Lectivo </label>
                            <div class="controls">
                                {!! Form::select('periodo', $periodos, null, ['class' => 'chosen-select', 'placeholder' => 'SELECCIONE', 'tabindex' => '2', 'onchange'=>'bloqueo()', 'id'=>'periodo']) !!}

                            </div>
                        </div>         
                        <div class="control-group">
                            <label> Estudiantes </label>
                            <div class="controls">
                                <select id="estudiantes" name="id_estudiante" data-placeholder="SELECCIONE" class="chosen-select" style="width:350px;" tabindex="2">
                                    <option value=""></option>
                                    @foreach($estudiantes as $per)
                                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>            
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>
                                       <label> Fecha Inicio: </label>
                                    </td>
                                    <td>
                                        {!! Form::date('inic', null, ['class' => 'form-control', 'style' => 'width: 150px;', 'id'=>'inicio']) !!}
                                    </td>
                                    <td>
                                        <label> Fecha Final: </label>
                                    </td>
                                    <td>
                                        {!! Form::date('fin', null, ['class' => 'form-control', 'style' => 'width: 150px;', 'id'=>'final']) !!}
                                    </td>
                                    <td>
                                        <label>Ordenar Por</label>
                                    </td>
                                    <td>
                                        {!! Form::select('literal', $abcedario, null, ['class' => 'form-control select', 'placeholder' => 'SELECCIONE', 'style' => 'width: 130px;', 'id'=>'literal']) !!}
                                    </td>
                                    <td>
                                        <label>Curso</label>
                                    </td>
                                    <td>
                                        {!! Form::select('curso', $cursos, null, ['class' => 'form-control select', 'placeholder' => 'SELECCIONE', 'id'=>'curso', 'style' => 'width: 130px;']) !!}
                                    </td>
                                </tr>
                            </thead>  
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">FACTURACIONES</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Vence</th>
                                <th>Cédula</th>
                                <th>Nombre(s)</th>
                                <th>Monto</th>
                                <th>Monto Deudor</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(!empty($facturacion))
                                    @foreach($facturacion as $key => $facturaciones)
                                    @if(!$facturacion->first()->factura->anulacion()->exists())
                                    <tr>
                                        @if(count($facturaciones->realizados) > 0)
                                            <?php $i = 0; $monto = 0; ?>
                                            @foreach($facturaciones->realizados as $pagos)

                                                <?php

                                                $i += $pagos->monto_pagado;
                                                $monto = $pagos->monto_adeudado;
                                                ?>

                                            @endforeach
                                        @else
                                            <?php $monto = $facturaciones->factura->total_pago; ?>
                                        @endif
                                        <td>{{$facturaciones->rubro->fecha}}</td>
                                        <td>{{$facturaciones->factura->estudiante->cedula}}</td>
                                        <td>{{$facturaciones->factura->estudiante->nombres}}</td>
                                        <td>{{$facturaciones->factura->total_pago}}</td>
                                        <td>{{$monto}}</td>
                                        <td style="text-align: center; width: 150px;">
                                            @if($monto != '0')
                                                <a href="{{ route('facturaciones.edit', $facturaciones->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
                                            @endif
                                            @if(count($facturaciones->realizados) > 0)
                                                <a href="{{ route('facturaciones.pdf', $facturaciones->id_factura) }}" class="btn btn-inverse"><i class="icon-print icon-white"></i></a>
                                            @endif
                                            <a href="#" class="btn btn-danger" onclick="anulacion({{ $facturaciones->id_factura }})" data-toggle="modal" data-target="#myModal"><i class="icon-ban-circle icon-white"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog" style="display: none;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Anular Factura</h4>
                </div>
                    {!! Form::open(['route' => ['facturaciones.destroy', 0133], 'method' => 'DELETE']) !!}
                <div class="modal-body">
                    ¿Esta seguro que desea anular esta factura en especifico?...
                </div>
                <div class="modal-body">
                    {!! Form::label('descripcion', 'MOTIVO') !!}
                    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'required' => 'required', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>

                        <input type="hidden" id="factura" name="id">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    


@endsection

@section('scripts')

    <script type="text/javascript">

        function anulacion(factura)
        {   
            $('#factura').val(factura);
        }
    </script>
    <script type="text/javascript">

        $(document).ready(function(){

            $('#periodo').on('change', function() {

                if(this.value != 0){

                    $("#inicio").attr('disabled', 'disabled');
                    $("#final").attr('disabled', 'disabled');
                    $("#literal").attr('disabled', 'disabled');
                    $("#curso").attr('disabled', 'disabled');
                }

                else{
                    $("#inicio").attr('disabled', false);
                    $("#final").attr('disabled', false);
                    $("#literal").attr('disabled', false);
                    $("#curso").attr('disabled', false);
                }
            });

            $('#inicio').on('change', function() {
                
                var myDate = new Date($("#final").val());
                
                if(this.value != null){
                    $("#periodo").prop('disabled', true).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', true).trigger("chosen:updated");
                }

                if(this.value == '' && myDate == 'Invalid Date' && $("#curso").val() == 0 && $("#literal").val() == 0){
                    $("#periodo").prop('disabled', false).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', false).trigger("chosen:updated");
                }
            });

            $('#final').on('change', function() {
                
                var myDate = new Date($("#inicio").val());

                if(this.value != null){
                    $("#periodo").prop('disabled', true).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', true).trigger("chosen:updated");
                }

                if(this.value == '' && myDate == 'Invalid Date' && $("#curso").val() == 0 && $("#literal").val() == 0){
                    $("#periodo").prop('disabled', false).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', false).trigger("chosen:updated");
                }
            });

            $('#literal').on('change', function() {
                
                var myDate = new Date($("#inicio").val());
                var myDate1 = new Date($("#final").val());

                if(this.value != null){
                    $("#periodo").prop('disabled', true).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', true).trigger("chosen:updated");
                }

                if(this.value == '' && myDate == 'Invalid Date' && myDate1 == 'Invalid Date' && $("#curso").val() == 0){
                    $("#periodo").prop('disabled', false).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', false).trigger("chosen:updated");
                }
            });

            $('#curso').on('change', function() {
                var myDate = new Date($("#inicio").val());
                var myDate1 = new Date($("#final").val());

                if(this.value != null){
                    $("#periodo").prop('disabled', true).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', true).trigger("chosen:updated");
                }
                if(this.value == '' && myDate == 'Invalid Date' && myDate1 == 'Invalid Date' && $("#literal").val() == ''){
                    $("#periodo").prop('disabled', false).trigger("chosen:updated");
                    $("#estudiantes").prop('disabled', false).trigger("chosen:updated");
                }
            });

            $('#estudiantes').on('change', function() {

                if(this.value != 0){

                    $("#inicio").attr('disabled', 'disabled');
                    $("#final").attr('disabled', 'disabled');
                    $("#literal").attr('disabled', 'disabled');
                    $("#curso").attr('disabled', 'disabled');
                }

                else{
                    $("#inicio").attr('disabled', false);
                    $("#final").attr('disabled', false);
                    $("#literal").attr('disabled', false);
                    $("#curso").attr('disabled', false);
                }
            });
        });
    </script>

@endsection