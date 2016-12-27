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
<script src="{{ asset('js/funciones.js') }}"></script>
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
<!-- <script>
    
    $(document).ready( function () 
    {

        $(document).on('click', '[type=checkbox]', function(event) {
            
            var aula = document.form.id_aula.value;  
            var bloque = $(this).val(); 
            
            //console.log(aula);
            $.get("/bloques/"+bloque+'/'+aula+"", function(data) 
            {
                    
                //console.log(data);
                if(data)
                {
                    $("input:checkbox").attr('checked', false);
                    alert('AULA OCUPADA');
                }

            });
        }); 

    });

</script> -->