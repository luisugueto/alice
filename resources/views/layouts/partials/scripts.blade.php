<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Bootstrap-Admin-Theme-master/assets/jquery.blockUI.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/easypiechart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/DT_bootstrap.js') }}"></script>
<script src="{{ asset('js/funciones.js') }}"></script>
<script src="{{ asset('js/jquery.shortcuts.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/jquery-validation/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>

<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
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

<script>

    $(document).ready(function(){

        $("#phone").mask("(9999) 999-9999");

        $("#phone").on("blur", function() {
            var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

            if( last.length == 3 ) {
                var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
                var lastfour = move + last;

                var first = $(this).val().substr( 0, 9 );

                $(this).val( first + '-' + lastfour );
            }
        });

    });

</script>

<script>

    $(function() {

        $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#rootwizard').find('.bar').css({width:$percent+'%'});
            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('#rootwizard').find('.pager .next').hide();
                $('#rootwizard').find('.pager .finish').show();
                $('#rootwizard').find('.pager .finish').removeClass('disabled');
            } else {
                $('#rootwizard').find('.pager .next').show();
                $('#rootwizard').find('.pager .finish').hide();
            }
        }});
        /*$('#rootwizard .finish').click(function() {
            alert('Finished!, Starting over!');
            $('#rootwizard').find("a[href*='tab1']").trigger('click');
        });*/
    });
</script>

<!--

SHORTCUTS

 -->

