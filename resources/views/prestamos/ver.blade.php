@extends('layouts.app')

@section('contentheader_title', 'Prestamos')
@section('contentheader_description', 'Ver')

@section('main-content')

<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 20px;">
            @include('alerts.request')
            @include('alerts.errors')
        </div>
    </div>

    <section class="content"> 
        <div class="row">
            <div class="col-md-12"> 

                 {!! Form::open(['route' => 'prestamos.listado', 'method' => 'GET', 'name' => 'form', 'id' => 'form']) !!}

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Prestamos y Anticipos</h3>
                        </div>
                        <div class="box-body">

                            {!! Form::label('Personal', 'Personal') !!}
							<select name="persona" required class="form-control select">
								<option  disabled selected>Seleccione</option>
								@foreach($personal as $per)
									<option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
								@endforeach
							</select>

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Ver</button>
                            </div>
                        </div>   
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </section>
</div>

@endsection
