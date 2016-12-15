<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="col-md-3 blog-sidebar right-sidebar">
                    <div class="col-md-11">
                        <div class="login">
                            <legend>
                                <i class="fa fa-user"></i>
                                Iniciar Sesión
                            </legend>
                        @if(Session::has('message-error'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                {{Session::get('message-error')}}
                            </div>
                        @endif
                        <form action="{{ route('login.store') }}" method="POST">
                            <input type="hidden" name="_token" value="{{ CSRF_TOKEN() }}">
                            <div class="form-horizontal">
                                <div class="form-group col-md-12 col-sm-4">
                                    <!-- <label for="user" class="control-label col-md-4">Correo</label> -->
                                    <div>
                                        <input type="email" class="form-control" placeholder="Correo" name="email">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-sm-4">
                                    <!-- <label for="user" class="control-label col-md-4">Contraseña</label> -->
                                    <div>
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-sm-4 text-center">
                                   <!-- <a ui-sref="inicio" href="{{ route('app.index') }}"><button class="btn btn-primary">Ingresar</button></a> -->
                                   <input type="submit" class="btn btn-primary" value="Ingresar">
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
    </body>
</html>
