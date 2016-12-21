@extends('layouts.app')

@section('contentheader_title', 'Tipo de Empleados')
@section('contentheader_description', '')

@section('main-content') 

<div class="col-md-12"><br><br>  
    <section class="content">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Registrando Tipo de Empleado</h3>
                    </div>
                    <div class="box-body">
                     {!! Form::open(['route' => 'tipo_empleado.store', 'method' => 'POST', 'class' => 'form']) !!}
                        @include('tipo_empleado.forms.create-fields') 
                        {!!Form::close()!!} 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection