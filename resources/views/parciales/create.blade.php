@extends('layouts.app')

@section('htmlheader_title')
    Parciales
@endsection
<?php 
        $parcial=buscar($estudiantes->id);
?>

@section('contentheader_title', 'Registro del '.$parcial)


@section('main-content')  

            <div class="col-md-12">

    <section class="content">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message-error'))
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
    @include('alerts.request') 
    <div class="row">
      <div class="col-md-12">
          <form action="{{ route('parciales.store') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              Estudiante:<br>
                        {{$estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres}}<br>
                        <strong>Matrícula Nro: </strong>{{$estudiantes->codigo_matricula}}<br>

                              </h3>
                            </div>
                              <div class="box-body" >
                      @include('parciales.forms.create-fields')
                    </div>
                      <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">                        
                      <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>        
                      </div>
            </div>                        
                      
           </form> 
           </div>
    </div>
@stop
<script type="text/javascript">
  
function promediar(){


      var deberes=document.f1.deberes;
      var promedio=document.f1.promedio;
      var promedio2=document.f1.promedio2;
      var individuales=document.f1.individuales;
      var grupales=document.f1.grupales;
      var lecciones=document.f1.lecciones;
      var aportes=document.f1.aportes;
      var promedio_ap=document.f1.promedio_ap;
      var promedio_ap2=document.f1.promedio_ap2;
      var p_ap=parseFloat(promedio_ap.value);
      var cualitativa=document.f1.cualitativa;
      var cualitativa2=document.f1.cualitativa2;
      var id_asignatura=document.f1.id_asignatura;


      cuantos=promedio.length;
     if(deberes.length == undefined){ 

      deberes.length = 1;
      promedio.length=1;
      promedio2.length=1;
      individuales.length=1;
      grupales.length=1;
      lecciones.length=1;
      aportes.length=1;
      cualitativa.length=1;
      cualitativa2.length=1;
      id_asignatura.length=1;

      

    }

    if (deberes.length==1) {
       if(deberes.value>10){
                  alert('El valor debe ser menor de 10');
                  deberes.value=1;
              }else{

                  if(individuales.value>10){
                    alert('El valor debe ser menor de 10');
                    individuales.value=1;
                  }else{

                    if (grupales.value>10) {
                      alert('El valor debe ser menor de 10');
                      grupales.value=1;

                    }else{
                      if (lecciones.value>10) {
                        alert('El valor debe ser menor de 10 ');
                        lecciones.value=1;
                      } else{
                          if (aportes.value>10) {
                            alert('El valor debe ser menor de 10 ');
                              aportes.value=1;
                          } else{

                                  if(deberes.value == null || deberes.value.length == 0 || /^\s*$/.test(deberes.value) ){
                                      deberes.value=1;
                                  }
                                  if(individuales.value == null || individuales.value.length == 0 || /^\s*$/.test(individuales.value) ){
                                      individuales.value=1;
                                  }
                                  if(grupales.value == null || grupales.value.length == 0 || /^\s*$/.test(grupales.value) ){
                                      grupales.value=1;
                                  }
                                  if(lecciones.value == null || lecciones.value.length == 0 || /^\s*$/.test(lecciones.value) ){
                                      lecciones.value=1;
                                  }
                                  if(aportes.value == null || aportes.value.length == 0 || /^\s*$/.test(aportes.value) ){
                                      aportes.value=1;
                                  }
                                    var d=deberes.value;
                                    var ind=individuales.value;
                                    var g=grupales.value;
                                    var l=lecciones.value;
                                    var a=aportes.value;
                                  var p=(parseFloat(d) + parseFloat(ind) + parseFloat(g) + parseFloat(l) + parseFloat(a))/5;
                                  p =parseFloat(Math.round(p * 100) / 100).toFixed(2);
                                    promedio.value=p;
                                    promedio2.value>=p;
                                   
                                    //--------------------calculando nota cualitativa------------
                                    if(p>=1 && p<=4){
                                      cualitativa.value="NAAR";
                                      cualitativa2.value="NAAR";
                                    }else{
                                      if (p>4 && p<7) {
                                        cualitativa.value="PAAR";
                                        cualitativa2.value="PAAR";
                                      } else{
                                        if (p>=7 && p<9) {
                                          cualitativa.value="AAR";
                                          cualitativa2.value="AAR";
                                        } else{
                                          if (p>=9 && p<=10) {
                                            cualitativa.value="DAR";
                                            cualitativa2.value="DAR";

                                          };
                                        };
                                      };
                                    }
                                    
                                  }
                              }
                          }
                      }
            }

    }else{

    
      
      for (var i = 0; i < deberes.length; i++) {
        
        
              if(deberes[i].value>10){
                  alert('El valor debe ser menor de 10');
                  deberes[i].value=1;
              }else{

                  if(individuales[i].value>10){
                    alert('El valor debe ser menor de 10');
                    individuales[i].value=1;
                  }else{

                    if (grupales[i].value>10) {
                      alert('El valor debe ser menor de 10');
                      grupales[i].value=1;

                    }else{
                      if (lecciones[i].value>10) {
                        alert('El valor debe ser menor de 10 ');
                        lecciones[i].value=1;
                      } else{
                          if (aportes[i].value>10) {
                            alert('El valor debe ser menor de 10 ');
                              aportes[i].value=1;
                          } else{

                                  if(deberes[i].value == null || deberes[i].value.length == 0 || /^\s*$/.test(deberes[i].value) ){
                                      deberes[i].value=1;
                                  }
                                  if(individuales[i].value == null || individuales[i].value.length == 0 || /^\s*$/.test(individuales[i].value) ){
                                      individuales[i].value=1;
                                  }
                                  if(grupales[i].value == null || grupales[i].value.length == 0 || /^\s*$/.test(grupales[i].value) ){
                                      grupales[i].value=1;
                                  }
                                  if(lecciones[i].value == null || lecciones[i].value.length == 0 || /^\s*$/.test(lecciones[i].value) ){
                                      lecciones[i].value=1;
                                  }
                                  if(aportes[i].value == null || aportes[i].value.length == 0 || /^\s*$/.test(aportes[i].value) ){
                                      aportes[i].value=1;
                                  }
                                    var d=deberes[i].value;
                                    var ind=individuales[i].value;
                                    var g=grupales[i].value;
                                    var l=lecciones[i].value;
                                    var a=aportes[i].value;
                                  var p=(parseFloat(d) + parseFloat(ind) + parseFloat(g) + parseFloat(l) + parseFloat(a))/5;
                                  p =parseFloat(Math.round(p * 100) / 100).toFixed(2);
                                    promedio[i].value=p;
                                    promedio2[i].value>=p;
                                   
                                    //--------------------calculando nota cualitativa------------
                                    if(p>=1 && p<=4){
                                      cualitativa[i].value="NAAR";
                                      cualitativa2[i].value="NAAR";
                                    }else{
                                      if (p>4 && p<7) {
                                        cualitativa[i].value="PAAR";
                                        cualitativa2[i].value="PAAR";
                                      } else{
                                        if (p>=7 && p<9) {
                                          cualitativa[i].value="AAR";
                                          cualitativa2[i].value="AAR";
                                        } else{
                                          if (p>=9 && p<=10) {
                                            cualitativa[i].value="DAR";
                                            cualitativa2[i].value="DAR";
                                          };
                                        };
                                      };
                                    }
                                    
                                  }
                              }
                          }
                      }
            }
      
      };

      };





      //-------- calculando promedio de aproevchamiento----------------
      var suma=0;
      parseFloat(suma);
      if (promedio.length==1) {
        var valor=parseFloat(promedio.value);
        suma=parseFloat(valor)+suma;

      } else{
        for (var x = 0; x< promedio.length; x++) {

        var valor=parseFloat(promedio[x].value);
        suma=parseFloat(valor)+suma;

      };  
      };
       suma=suma/parseInt(promedio.length);
       

       suma=parseFloat(Math.round(suma * 100) / 100).toFixed(2);
       //alert(''+suma);
       promedio_ap.value=suma;
       promedio_ap2.value=suma;




}

</script>