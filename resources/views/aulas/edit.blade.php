@extends('layouts.app')
@section('contentheader_title', 'Editar aula')

@section('htmlheader_title')
    Editar aula
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($aula, ['route'=>['aulas.update', $aula->id], 'method'=>'PUT', 'files'=>false])!!}
          {{ csrf_field() }}
          <br>
          @include('aulas.forms.fields')
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}
@stop