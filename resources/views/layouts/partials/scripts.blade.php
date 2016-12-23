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
    
    $(document).ready(function (){
        bloqueo();
    });

    function bloqueo() 
    {
        if($('#bloquear').prop("checked"))
        {
            for(i=0; i < 8; i++)
            {
                $('#zapata'+i).attr('disabled', true);
            }

            $('#contenido').css('display', 'none');
             
        }else{

            for(i=0; i < 8; i++)
            {
                $('#zapata'+i).attr('disabled', false);
            }

            $('#contenido').css('display', '');
        }

    }
    
</script>
<script type="text/javascript">

    function modalidad()
    {
        
        var modalidad=document.form.id_modalidad;
        var monto_pagar=document.form.monto_pagar;

        if(modalidad.value==1)
        {
            monto_pagar.disabled=true;

        }else{

            monto_pagar.disabled=false;

        }
    }
    function bloqueos2()
    {
        
    var checkboxes = document.form.id_forma;
    
    //for(var i=0;i<checkboxes.length;i++){
   
        if(checkboxes[0].checked==false && checkboxes[1].checked==false && checkboxes[2].checked==false){
          
            alert("Debe Seleccionar alguna de las otras opciones");
              
            if(checkboxes[0].checked==false){
                checkboxes[0].checked=true;
            }
            if(checkboxes[1].checked==false){
                checkboxes[1].checked=true;
            }
            if(checkboxes[2].checked==false){
                checkboxes[2].checked=true;
            }
          
        }

        if(checkboxes[1].checked==true){
            document.form.nro_cheque.disabled=false;
        
        }else{
            document.form.nro_cheque.disabled=true;
        }
        
        if(checkboxes[2].checked==true){
          
          document.form.nro_transferencia.disabled=false;
        
        }else{
          
          document.form.nro_transferencia.disabled=true;
        }

    }
</script>
<script>
    $(document).ready( function () 
    {
        $("#curso").change(function() {

            var id = $("#curso").val();

            $.get("/seccionesHorarios/"+id+"", function(data) 
            {

                
                $("#seccion").empty();
                $("#seccion").append('<option value="0"> Seleccione </option>');

                if(data.length > 0){

                    for (var i = 0; i < data.length ; i++) 
                    {  
                        $("#seccion").removeAttr('disabled');
                        $("#aula").removeAttr('disabled');
                        $("#asignatura").removeAttr('disabled');
                        $("#seccion").append('<option value="'+ data[i].id + '">' + data[i].literal +'</option>')
                    }

                }else{
                    
                    $("#seccion").attr('disabled', true);
                    $("#aula").attr('disabled', true);
                    $("#asignatura").attr('disabled', true);

                }
            });
        });

        $("#curso").change(function() {

            var id = $("#curso").val();

            $.get("/asignaturasHorarios/"+id+"", function(data) 
            {

                $("#asignatura").empty();
                $("#asignatura").append('<option value="0"> Seleccione </option>');

                for (var i = 0; i < data.length ; i++) 
                {  
                    $("#asignatura").append('<option value="'+ data[i].id + '">' + data[i].asignatura +'</option>')
                }
            });
        });
    });
</script>
<script type="text/javascript">
        
    function padre_ch()
    {
        if($('#habilitar').prop('checked'))
        {
            $("[id=padre]").each(function(index, element)
            {
                $(element).attr('disabled', false);
            });
        
        }else{

             $("[id*=padre]").each(function(index, element)
             {
                $(element).attr('disabled', true);
             });
        }
    }

    function padre_ch2()
    {
        if($('#habilitar2').prop('checked'))
        {
            $("[id=padre2]").each(function(index, element)
            {
                $(element).attr('disabled', false);
            });
        
        }else{

             $("[id*=padre2]").each(function(index, element)
             {
                $(element).attr('disabled', true);
             });
        }
    }
     
</script>
<script type="text/javascript">
    
    function capacidad_es() 
    {

        var radio = document.form.capacidad;
        var area = document.form.capacidad_especial;

        if(radio.value == 'Si')
        {
            area.disabled = false;

        }else{

            area.disabled = true;
        }

    }

    function medicinas()
    {
        var radio = document.form.medicinas_e;
        var area = document.form.medicinas_contraindicadas;

        if(radio.value == 'Si')
        {
            area.disabled = false;

        }else{

            area.disabled = true;
        }
    }

    function alergia()
    {
        var radio = document.form.alergico;
        var area = document.form.alergico_a;

        if(radio.value == 'Si')
        {
            area.disabled = false;

        }else{

            area.disabled = true;
        }
    }

    function patologia_es()
    {
        var radio = document.form.patologia_estudiante;
        var area = document.form.patologia;

        if(radio.value == 'Si')
        {
            area.disabled = false;

        }else{

            area.disabled = true;
        }
    }

    function discapacidad()
    {
        var radio = document.form.discapacidad_e;
        var area = document.form.porcentaje_discapacidad;
        
        if(radio.value == 'Si')
        {
            area.disabled = false;

        }else{

            area.disabled = true;
        }
    }
</script>
<script type="text/javascript">
    function readURL(input) 
    {
      if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
      $('#img_prev')
      .attr('src', e.target.result);   //  ACA ESPECIFICAN QUE TAMANO DE ALTO QUIEREN
      };
      reader.readAsDataURL(input.files[0]);
      }
    }
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