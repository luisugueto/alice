@extends('layouts.app')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content')
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12"> 

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Curso: {{ $curso->curso }}</h3>
                        </div>
                        <div class="box-body">
                           @include('horarios.forms.fields-edit')  
                        </div>
                    </div>
             
@endsection

<script type="text/javascript">
  
    function eliminar(curso, asignatura, bloque, aula, seccion)
    {
        
        console.log(asignatura);
        $('#seccion').val(seccion);
        $('#curso').val(curso);
        $('#asignatura').val(asignatura);
        $('#bloque').val(bloque);
        $('#aula').val(aula);
    }

</script>