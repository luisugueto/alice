@extends('welcome')

@section('contentheader_title', 'Perfil')
@section('contentheader_description', 'Editar')


@section('main-content')

    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Usuario</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!!Form::model($user, ['route'=>['user_perfil.update', $user->id], 'class' => 'form-horizontal', 'method'=>'PUT', 'files' => true])!!}
                {{ csrf_field() }}
                    <fieldset>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <legend>Form Horizontal</legend>

                        @include('perfils.forms.fields')

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Actulizar</button>
                            <button type="reset" class="btn">Cancelar</button>
                        </div>
                    </fieldset>
                </form>

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