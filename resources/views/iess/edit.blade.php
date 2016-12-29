@extends('layouts.app')
@section('contentheader_title', 'Editar IESS')

@section('htmlheader_title')
    Editar IESS
@endsection


@section('main-content')      
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">              
           
          {!!Form::model($iess, ['route'=>['iess.update', $iess->id], 'method'=>'PUT', 'files'=>false])!!}
          @include('iess.forms.fields')
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop