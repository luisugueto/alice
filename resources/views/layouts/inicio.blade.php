<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema María Montessori</title>
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
<body role="document">

    <div class="page-header col-md-12">
        <div class="logo"></div>
        <h1><strong>Proyecto Alice</strong></h1>
    </div>

    
    <div class="col-md-2 blog-sidebar">
        <div class="col-md-12 menu">
            <ul>
                <li class="nombre">{{ Auth::user()->name }}</li>
                  <li>
                    <a href="/logout">
                        <i class="fa fa-power-off fa-fw">Salir</i>
                    </a>
                </li>
                <li>
                    <a href="/usuarios">
                        <i class="fa fa-power-off fa-fw">Usuarios</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
                @yield('content')

    <script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>