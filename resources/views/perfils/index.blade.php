@extends('layouts.app')

@section('htmlheader_title')
    Perfil
@endsection

@section('contentheader_title', 'Perfil')


@section('main-content')                    
<div class="col-md-12">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @include('alerts.errors')
     
    
<section class="content">
    <br><br><br>
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
                {{ Form::label('Foto', 'Foto: ') }}
                <img src="{{ asset('perfil/'.$user->foto)}}" style="width: 200px; height: 200px;">
            </div>    
            <div>
                 {!!link_to_route('user_perfil.edit', $title = '', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary fa fa-edit fa-2x'])!!}
            </div> 
        </div>
    </div>
</section>
@stop