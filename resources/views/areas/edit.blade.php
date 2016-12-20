@extends('layouts.app')
@section('contentheader_title', 'Editar Area de Trabajo')

@section('htmlheader_title')
    Editar Area de Trabajo
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($area, ['route'=>['areas.update', $area->id], 'method'=>'PUT', 'files'=>false])!!}
          {{ csrf_field() }}
          <br>
          @include('areas.forms.fields')
           <div class="form-group" align="center">
                    {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
                  {!!Form::close()!!}
                  <br>
                  {!!Form::open(['route'=>['areas.destroy', $area['id']], 'method'=>'DELETE'])!!}
                    <br>
                      {!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!}
                    {!!Form::close()!!}
@stop