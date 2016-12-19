@extends('layouts.app')

@section('contentheader_title', 'Rubro')
@section('contentheader_description', 'Estudiante')

@section('main-content') 

<div class="col-md-12"><br><br>  
    <section class="content">
        <div class="row">
            {!! Form::open(['route' => ['rubros.update', $rubros->id], 'method' => 'PUT', 'name' => 'form']) !!}
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Deuda: {{ $rubros->monto }}</h3>
                        </div>
                        <div class="box-body">
                            @include('rubros.forms.fields-edit')  
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
</div>

@endsection