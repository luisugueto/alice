@extends('welcome')

@section('contentheader_title', 'Usuario')
@section('contentheader_description', 'Editar')

@section('main-content')

           
    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Usuario {{ $user->name }}</div>
            </div>
            <div class="block-content collapse in">
                    <div class="span3"></div>
                    <div class="span4">
                    
                      {!!Form::model($user, ['route'=>['usuarios.update', $user->id], 'class'=>'form-horizontal','method'=>'PUT', 'files' => true])!!}

                        <div class="control-group">
                            {!! Form::label('Nombre', 'Nombre(s)', ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('name', null, ['class'=>'input-xlarge', 'placeholder'=> 'JESÚS EDUARDO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
                            </div>
                        </div>
                        <div class="control-group">
                            {!! Form::label('Email', 'Correo Electrónico', ['class'=>'control-label']) !!}
                            <div class="controls">
                                {!! Form::text('email', null, ['class' => 'input-xlarge', 'placeholder'=>'ejemplo@ejemplo.com']) !!}
                            </div>
                        </div>

                        <div class="control-group">
                            {!! Form::label('Roles', 'Roles', ['class'=>'control-label']) !!}
                            <div class="controls">
                                <select name="roles_id" class="input-xlarge select">
                                    @foreach($roles as $r)
                                        <option value="{{ $r->id }}">{{ $r->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="reset" class="btn btn-default btn-flat">Borrar</button>
                            <button type="submit" class="btn btn-primary btn-flat">Actualizar</button>
                        </div>

                    </div>

                    {!! Form::close() !!}

                    </div>
            </div>
        </div>
    </div>
@endsection
