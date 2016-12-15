<!doctype html>
<html lang="es" ng-app="mainApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Coordinación de Vinculación Social</title>
    <meta name="description" content="">

</head>
<body role="document" ng-app="appVS">
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
                        <i class="fa fa-power-off fa-fw">Salir
                    </a>
                </li>
                <li>
                    <a href="/usuarios">
                        <i class="fa fa-power-off fa-fw">Usuarios
                    </a>
                </li>

                @yield('content')
</body>
</html>