@extends('layouts.app')

@section('htmlheader_title')
    Perfil
@endsection

@section('contentheader_title', 'Perfil')


@section('main-content')    
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                 <div class="content-fluid" align="center">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            {{ Form::label('Nombre', 'Nombre: ') }}
                            {{ $user->name }}
                        </div>
                        <div class="col-md-12 form-group">
                            {{ Form::label('Correo', 'Correo: ') }}
                            {{ $user->email }}
                        </div>
                        <div>
                            @if($user->foto == '')
                                {{ Form::label('Foto', 'Foto: ') }}
                                <img src="../../img/ingresar.jpg">
                            @else
                                {{ Form::label('Foto', 'Foto: ') }}
                                <img src="{{ asset('perfil/'.$user->foto)}}" style="width: 200px; height: 200px;">
                        </div>
                        @endif
                        <div>
                            {!!link_to_route('user_perfil.edit', $title = '', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary fa fa-edit fa-2x'])!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop