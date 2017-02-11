@extends('welcome')

@section('contentheader_title', 'Quimestres')
@section('contentheader_description', 'Edit')

@section('main-content')  
	
	<div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Actualizar quimestre</div>
            </div>
            <div class="block-content collapse in">
                <div class="span3"></div>
                <div class="span4">
                   	{!!Form::model($quimestres, ['route' => ['quimestres.update', $quimestres->id], 'method' => 'PUT', 'id' => 'f1', 'name' => 'f1', 'class' => 'form-horizontal'])!!}

                        @include('quimestres.forms.create-fields')

                    
                        <div class="span12 text-center">
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <button type="reset" class="btn">Borrar</button>
                            </div>
                        </div>
                        
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
 
@endsection