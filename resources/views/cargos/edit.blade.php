@extends('layouts.app')
@section('contentheader_title', 'Editar Cargo')

@section('htmlheader_title')
    Editar Cargo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($cargo, ['route'=>['cargos.update', $cargo->id], 'method'=>'PUT', 'files'=>false])!!}
          {{ csrf_field() }}
          <br>
          @include('cargos.forms.fields')
           <div class="form-group" align="center">
                    {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
                  {!!Form::close()!!}
                  <br>
                  {!!Form::open(['route'=>['cargos.destroy', $cargo['id']], 'method'=>'DELETE'])!!}
                    <br>
                      {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
@stop