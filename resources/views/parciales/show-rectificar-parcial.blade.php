@extends('layouts.app')
@section('contentheader_title', 'Estudiantes')

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
                            <h3 class="box-title">Rectificación de Calificación de Parcial</h3>
                            
                        </div>

                        <div class="box-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
               
@endsection