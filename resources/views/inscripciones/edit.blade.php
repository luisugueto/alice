@extends('welcome')

@section('contentheader_title', 'Sección')
@section('contentheader_description', 'Nueva')

@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Cambio de Sección del Estudiante</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!!Form::model($estudiantes, ['route'=>['inscripciones.update', $estudiantes->id], 'method'=>'PUT', 'class' => 'form-horizontal'])!!}
                    <fieldset>
                        <legend>{{$estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}
                            <strong>MATRÍCULA NRO: </strong>{{$estudiantes->codigo_matricula}}</legend>

                        @include('inscripciones.forms.edit-fields')

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn">Borrar</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>

@endsection
