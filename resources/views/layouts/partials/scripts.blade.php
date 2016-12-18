<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- DataTables -->
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

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

<script type="text/javascript">

    $(document).ready(function() {

        var MaxInputs       = 30; 
        var contenedor      = $("#contenedor"); 
        var AddButton       = $("#agregarCampo"); 

        //var x = número de campos existentes en el contenedor
        var x = $("#contenedor div").length + 1;
        var FieldCount = x-1;

        $(AddButton).click(function (e) {
            if(x <= MaxInputs) 
            {
                FieldCount++;
                console.log(FieldCount+1);
                $(contenedor).append('<div id="remove">'+
                                     '<div class="box-body">'+
                                     '<div class="col-md-4">'+
                                     '<div class="form-group">'+
                                     '<label for="nombre">Nombre</label>'+
                                     '<input class="form-control" id="campo_'+ FieldCount +'" placeholder="MATRICULA INICIAL" onkeyup="javascript:this.value=this.value.toUpperCase()" name="nombre['+FieldCount+']" type="text">'+
                                     '</div>'+
                                     '</div>'+
                                     '<div class="col-md-4">'+
                                     '<div class="form-group">'+
                                     '<label for="fecha_max">Fecha</label>'+
                                     '<input class="form-control" id="campo_'+ FieldCount +'" placeholder="35" name="fecha_max['+FieldCount+']" type="date">'+
                                     '</div>'+
                                     '</div>'+
                                     '<div class="col-md-3">'+
                                     '<div class="form-group">'+
                                     '<label for="monto">Monto</label>'+
                                     '<input class="form-control" id="campo_'+ FieldCount +'"  placeholder="35" name="monto['+FieldCount+']" type="number">'+
                                     '</div>'+
                                     '</div>'+
                                     '<div class="col-md-1">'+
                                     '<center>'+
                                     '<label for="agregar">Eliminar</label>'+
                                     '<a href="#" class="eliminar"><i class="fa fa-minus-square btn-lg"></i></a>'+ 
                                     '</center>'+
                                     '</div>'+
                                     '</div>'+
                                     '</div>');
                x++; 
            }
            return false;
        });

        $("body").on("click", ".eliminar", function(e){ 
            if( x > 1 ) {
                $("#remove").remove(); 
                x--;
            }
            return false;
        });
    });

</script>
<script type="text/javascript">
    
    function bloqueo() {
        if($('#bloquear').prop("checked"))
        {
            for(i=0; i < 8; i++)
            {
                $('#zapata'+i).attr('disabled', true);
            }

            $('#contenido').css('display', 'none');
             
        }else{

            $('#contenido').css('display', '');
        }

    }
    
</script>