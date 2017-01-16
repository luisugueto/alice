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



    <div id="login">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Disculpe!</strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">

            <form class="form-signin" action="{{ url('/login') }}" method="post">
                <p class="login-box-msg"> Iniciar Sesión <br> Periodo Lectivo Activo: {{$periodos2->nombre}} </p>
                {{ csrf_field() }}
                <input type="email" required class="input-block-level" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <input type="password" required class="input-block-level" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                {!! Form::select('periodos',$periodos, $periodos2->id, ['class' => 'input-block-level','title' => 'Introduzca el Tipo de Registro  del personal']) !!}
                <div align="center">
                    <button class="btn btn-large btn-primary" type="submit">Entrar</button>
                </div>
                <br><a href="{{ url('/password/reset') }}">Reestablecer Contraseña</a>
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
