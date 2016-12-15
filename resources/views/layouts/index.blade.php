<!doctype html>
<html lang="es" ng-app="mainApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Proyecto Alice</title>
    <meta name="description" content="">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Proyecto Alice" />
    <!-- <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css"> -->

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
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>
