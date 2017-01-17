@extends('welcome')

@section('contentheader_title', 'Perfil')
@section('contentheader_description', 'Inicio')


@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Usuario</div>
            <a href="{{ route('user_perfil.edit', $user->id) }}" class="btn btn-default pull-right"><i class="icon icon-cog"></i></a>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <fieldset>
                    <legend>{{ $user->name }}</legend>
                    <div class="span12 text-center">
                        <div class="control-group">
                            CORREO ELECTRÓNICO <br><br> {{ $user->email }}
                        </div>
                        @if($user->foto == '')
                            {{ Form::label('Foto', 'FOTO ') }}
                            <img src="../../img/ingresar.jpg">
                        @else
                            {{ Form::label('Foto', 'FOTO ') }}
                            <img src="{{ asset('perfil/'.$user->foto)}}" style="width: 200px; height: 200px;">
                        @endif
                    </div>
                 </fieldset>
            </div>
        </div>
    </div>

@stop