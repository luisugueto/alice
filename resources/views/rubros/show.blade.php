@extends('layouts.app')

@section('contentheader_title', 'Rubros')
@section('contentheader_description', 'Estudiante')

@section('main-content') 

<div class="col-md-12"><br><br>  
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Total: {{ count($rubros) }}</h3>
                    </div>
                    <div class="box-body">
                        @include('rubros.forms.fields-show')  
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection