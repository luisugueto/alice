@extends('layouts.auth')

@section('htmlheader_title')
    Cambiar Contraseña
@endsection

@section('content')
    <br><br>
    <div class="login-logo">
        <h2><b>Sistema Administrativo y Académico<br>María Montessori</b></h2>
    </div>
    <body class="hold-transition login-page">

            @include('alerts.errors')

    <div id="login">

        <div class="container">

            <form class="form-signin" action="{{ url('/password/email') }}" method="post">
                <p class="login-box-msg"> Cambiar Contraseña </p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    Correo: <input type="email" class="form-control" placeholder="Correo" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div align="left">
                   
                    <div class="col-xs-8" align="center">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar Contraseña</button>
                    </div><!-- /.col -->
                   
                    <br><a href="{{ url('/login') }}">Iniciar Sesión</a><br>
                </div>
            </form>

        </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->

    @include('layouts.partials.scripts_auth')

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
