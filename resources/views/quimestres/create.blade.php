@extends('layouts.app')

@section('htmlheader_title')
    Quimestres
@endsection

@section('contentheader_title', 'Registro del Quimestre')


@section('main-content')  

            <div class="col-md-14">

    <section class="content">
    @include('alerts.request') 
    <div class="row">
      <div class="col-md-14">
          <form action="{{ route('quimestres.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              Estudiante:
                              Curso:
                              </h3>
                            </div>
                              <div class="box-body">
                      @include('quimestres.forms.create-fields')
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
           </section>
           </div>
@stop