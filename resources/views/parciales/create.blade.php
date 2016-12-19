@extends('layouts.app')

@section('htmlheader_title')
    Parciales
@endsection

@section('contentheader_title', 'Registro del () Parcial del () Quimestre')


@section('main-content')  

            <div class="col-md-12">

    <section class="content">
    @include('alerts.request') 
    <div class="row">
      <div class="col-md-12">
          <form action="{{ route('parciales.store') }}" method="POST" id="f1" name="f1">

                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              Estudiante:
                              Curso:
                              </h3>
                            </div>
                              <div class="box-body">
                      @include('parciales.forms.create-fields')
                    </div>
                      <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">                        
                      <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>        
                      </div>
            </div>                        
                      
           </form> 
           </div>
    </div>
@stop