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
          @include('perfils.forms.fields')
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