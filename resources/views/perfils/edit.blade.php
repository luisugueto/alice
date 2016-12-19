@extends('layouts.app')
@section('contentheader_title', 'Editar Perfil')

@section('htmlheader_title')
    Editar Perfil
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
    <section class="content">
    <div class="row">

      <div class="col-md-12">
          {!!Form::model($user, ['route'=>['user_perfil.update', $user->id], 'method'=>'PUT', 'files'=>true])!!}
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $user->id }}">
          <br>
          <div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('name', null, ['required','class'=>'form-control','placeholder'=>'Ingresa Nombre']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Correo', 'Correo') !!}
            {!! Form::email('email', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Correo']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Nombre', 'Foto') !!}
            {!! Form::file('foto')!!}
          </div>
          <div class="form-group">
            {{ Form::label('Editar', 'Editar Contraseña') }}
            <input type="checkbox" id="verificarr" name="verificar" onclick="verifica()">
          </div>
      <div id="ocultar" style="display:none;">
          <div class="form-group">
            {!! Form::label('Nombre', 'Nueva Contraseña') !!}
            {!! Form::password('nueva', ['id'=>'confirmar','class'=>'form-control','placeholder'=>'Nueva Contraseña']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Nombre', 'Confirmar Contraseña') !!}
            {!! Form::password('confirmar', ['id'=>'confirmar1','class'=>'form-control','placeholder'=>'Confirmar Contraseña']) !!}
          </div>
          <br>
      </div>
          <div align="center">
              {!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}
          </div>
          {!!Form::close()!!}

<script type="text/javascript">
    function verifica(){ 
      if( $('#verificarr').prop('checked') ) {
          $('#ocultar').css('display', '');
          $('#confirmar').attr('disabled', false);
          $('#confirmar').attr('required', true);
          $('#confirmar1').attr('required', true);
      }else
      {
         $('#ocultar').css('display', 'none');
         $('#confirmar').attr('disabled', true);
         $('#confirmar').attr('required', false);
         $('#confirmar1').attr('required', false);
      }
    }
</script>
@stop