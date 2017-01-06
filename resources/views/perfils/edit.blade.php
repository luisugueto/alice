@extends('layouts.app')

@section('contentheader_title', 'Perfil')
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
                        <h3 class="box-title">Usuario</h3>
                    </div>

                    {!!Form::model($user, ['route'=>['user_perfil.update', $user->id], 'method'=>'PUT', 'files'=>true])!!}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="box-body">

                            @include('perfils.forms.fields')

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default btn-flat">Cancelar</button>
                                <button type="submit" class="btn btn-primary pull-right btn-flat">Actualizar</button>
                            </div>

                        </div>

                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    function verifica()
    {
        if( $('#verificarr').prop('checked') ) {
            $('#ocultar').css('display', '');
            $('#confirmar').attr('disabled', false);
            $('#confirmar').attr('required', true);
            $('#confirmar1').attr('required', true);
        } else {
            $('#ocultar').css('display', 'none');
            $('#confirmar').attr('disabled', true);
            $('#confirmar').attr('required', false);
            $('#confirmar1').attr('required', false);
        }
    }
</script>
@stop