@extends('welcome')

@section('contentheader_title', 'Quimestre')
@section('contentheader_description', 'Nuevo')

@section('main-content')
    
    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Quimestre nuevo</div>
            </div>
            <div class="block-content collapse in">
                <div class="span3"></div>
                <div class="span4">
                    {!! Form::open(['route' => 'quimestres.store', 'method' => 'POST', 'name' => 'f1', 'id' => 'f1', 'class' => 'form-horizontal']) !!}
                        
                        @include('quimestres.forms.create-fields')

                    
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn">Borrar</button>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


@endsection

