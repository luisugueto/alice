@extends('layouts.app')

@section('contentheader_title', 'Usuario')
@section('contentheader_description', 'Editar')

@section('main-content')

    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Usuario {{ $user->name }}</h3>
                    </div>

                    {!!Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'PUT', 'files' => true])!!}

                    <div class="box-body">

                        <div class="form-group">
                            {!! Form::label('Nombre', 'Nombre(s)') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'JESÚS EDUARDO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Email', 'Correo Electrónico') !!}
                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'ejemplo@ejemplo.com']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Roles', 'Roles') !!}
                            <select name="roles_id" class="form-control select">
                                @foreach($roles as $r)
                                    <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                            <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
