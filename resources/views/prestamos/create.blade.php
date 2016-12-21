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
            @include('prestamos.forms.fields')
           <div align="center">
              {!!Form::submit('Aceptar', ['class'=>'btn btn-primary'])!!}
          </div>
        </form> 
@stop