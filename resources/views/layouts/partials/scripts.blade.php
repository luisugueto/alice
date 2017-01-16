<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/easypiechart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/DT_bootstrap.js') }}"></script>
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/jquery.shortcuts.min.js') }}"></script>

<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });
</script>

<script>
    $(document).hotkey('shift+p', function() {
        window.location.href = '/prestamos/create';
    });
    $(document).hotkey('ctrl+m', function() {
        window.location.href = '/inscripciones';
    });
    $(document).hotkey('shift+l', function() {
        window.location.href = '/estudiantes';
    });
    $(document).hotkey('ctrl+c', function() {
        window.location.href = '/personal';
    });
    $(document).hotkey('shift+k', function() {
        window.location.href = '/parciales/{{ Auth::user()->id }}';
    });
    $(document).hotkey('ctrl+b', function() {
        window.location.href = '/parciales/mostrarcalificaciones';
    });
</script>

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

