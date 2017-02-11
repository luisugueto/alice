@extends('layouts.auth')

@section('htmlheader_title')
    Entrar
@endsection

@section('content')
    <br><br>
    <div class="login-logo">
        <h2><b>Sistema Administrativo y Académico<br>María Montessori</b></h2>
    </div>
    <body class="hold-transition login-page">
    <div>
            @include('alerts.errors')
    </div>
    <br>
    <div id="login">

        <div class="container">

            <form class="form-signin" action="{{ url('/login') }}" method="post">
                <p class="login-box-msg"> Iniciar Sesión <br> Periodo Lectivo Activo: {{$periodos2->nombre}} </p>
                {{ csrf_field() }}
                <input type="email" required class="input-block-level" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <input type="password" required class="input-block-level" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                {!! Form::select('periodos',$periodos, $periodos2->id, ['class' => 'input-block-level','title' => 'Introduzca el Tipo de Registro  del personal']) !!}

                {!! captcha_image_html('ExampleCaptcha') !!}
                <input type="text" id="CaptchaCode" name="CaptchaCode">
                <div align="left">
                   
                    <div class="col-xs-8" align="center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div><!-- /.col -->
                   
                    <br><a href="{{ url('/password/reset') }}">Reestablecer Contraseña</a>
                </div>
            </form>
        </div>
    </div> <!-- /container -->




    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    </body>

@endsection
