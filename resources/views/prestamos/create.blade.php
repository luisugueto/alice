@extends('layouts.app')
@section('contentheader_title', 'Prestamos y Anticipos')

@section('htmlheader_title')
    Crear Prestamo o Anticipo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    @include('alerts.errors')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          <form action="{{ route('prestamos.store') }}" method="POST" id="f1" name="f1">
          {{ csrf_field() }}
            <div class="form-group">
              {!! Form::label('Personal', 'Personal') !!}
              <select name="personal" required class="form-control select">
                <option  disabled selected>Seleccione</option>
                    @foreach($personal as $per)
                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                    @endforeach
              </select>
            </div>
            <div class="form-group">
              {!! Form::label('Tipo', 'Tipo') !!}
              {!! Form::select('tipo', array('P' => 'Prestamo', 'A' => 'Anticipo'), null, ['class' => 'form-control', 'title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('Monto', 'Monto') !!}
              {!! Form::number('monto', null, ['class' => 'form-control', 'title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300.00']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('Motivo', 'Motivo') !!}
              {!! Form::textarea('motivo', null, ['class' => 'form-control', 'title' => 'Introduzca el Motivo', 'placeholder' => 'Ejm: Deudas', 'rows' => '3']) !!}
            </div>
           <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
        </form> 
@stop