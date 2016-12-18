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

      <div class="col-md-14">
          <form action="{{ route('prestamos.listado') }}" method="get">
          {{ csrf_field() }}
            <div class="form-group">
              {!! Form::label('Personal', 'Personal') !!}
              <select name="persona" required class="form-control select">
                <option  disabled selected>Seleccione</option>
                    @foreach($personal as $per)
                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                    @endforeach
              </select>
            </div>
           <div align="center">
              {!!Form::submit('Seleccionar', ['class'=>'btn btn-primary'])!!}
          </div>
        </form> 
@stop