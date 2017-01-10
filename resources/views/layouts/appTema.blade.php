<!DOCTYPE html>
<html lang="es">
<head>
  <title>Sistema Administrativo y Académico María Montessori</title> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('tema/bootstrap/dist/css/bootstrap.min.css') }} ">
  <!-- <link href="{{ asset('tema/css/fontawesomeicons.min.css') }} " rel="stylesheet" /> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

  <link href="{{ asset('tema/font-awesome/css/font-awesome.css') }} " rel="stylesheet" />
  <link href="{{ asset('tema/css/app.css') }} " rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('tema/css/fullcalendar.css') }} " />
  <link rel="stylesheet" href="{{ asset('tema/css/jquery.gritter.css') }} " />
<body>
  <div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-inverse">
          <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
              @include('layouts.partials.menu')
          </div>
        </nav>
    </div>
  </div>
  <!--- Fin del primer contenedor -->

  <div id="content">
    <div id="content-header">
    <div id="breadcrumb">
        @include('layouts.partials.contentheader')
    </div>
  </div>
  <br>
  @yield('main-content')
  </div>

<!--Footer-part-->
<div class="row-fluid">
<br>
  <div id="footer" class="span12">  <!-- To the right -->
    <div class="pull-right hidden-xs">
        <a href="https://github.com/Jessetl/alice"><b>Sistema María Montessori</b></a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016. Ing. Luis Ugueto, Ing. Cesar Characo, Ing. Jesús Matute</strong>
    </div>
</div>

  <script type="text/javascript" src="{{ asset('tema/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('tema/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('tema/js/excanvas.min.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.ui.custom.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.flot.min.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.flot.resize.min.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.peity.min.js') }}"></script> 
  <script src="{{ asset('tema/js/fullcalendar.min.js') }}"></script> 
  <!-- <script src="{{ asset('tema/js/matrix.js') }}"></script>  -->
  <script src="{{ asset('tema/js/matrix.dashboard.js') }}"></script> 
  <!-- <script src="{{ asset('tema/js/jquery.gritter.min.js') }}"></script>  -->
  <script src="{{ asset('tema/js/matrix.interface.js') }}"></script> 
  <script src="{{ asset('tema/js/matrix.chat.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.validate.js') }}"></script> 
  <script src="{{ asset('tema/js/matrix.form_validation.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.wizard.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.uniform.js') }}"></script> 
  <script src="{{ asset('tema/js/select2.min.js') }}"></script> 
  <script src="{{ asset('tema/js/matrix.popover.js') }}"></script> 
  <script src="{{ asset('tema/js/jquery.dataTables.min.js') }}"></script> 
  <script src="{{ asset('tema/js/matrix.tables.js') }}"></script> 
  <script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
  <!-- DataTables -->
<!--   <script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.js') }}"></script> -->
  <script src="{{ asset('js/funciones.js') }}"></script>
  <script src="{{ asset('js/jquery.shortcuts.min.js') }}"></script>

  <script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<!--

SHORTCUTS

 -->

<script>
    $(document).hotkey('shift+f1', function() {
        window.location.href = '/nuevo_personal';
    });
    $(document).hotkey('shift+f2', function() {
        window.location.href = '/representante/buscar';
    });
    $(document).hotkey('ctrl+f3', function() {
        window.location.href = '/facturaciones/buscar/estudiante';
    });
    $(document).hotkey('f4', function() {
        window.location.href = '/prestamos/create';
    });  
</script>
</body>
</html>