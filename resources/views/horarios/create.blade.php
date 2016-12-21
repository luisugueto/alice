@extends('layouts.app')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content') 
<div class="col-md-12"><br><br>
    @include('alerts.request')
    @include('alerts.errors')
    <div class="col-md-12">  
        <section class="content">
            <div class="row">
                {!! Form::open(['route' => 'horarios.store', 'method' => 'POST', 'name' => 'form', 'id' => 'form']) !!}
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Curso: {{ $curso->curso }}</h3>
                            </div>
                            <div class="box-body">
                                @include('horarios.forms.fields')  
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>
@endsection