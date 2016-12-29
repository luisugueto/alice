@extends('layouts.app')

@section('htmlheader_title')
    Quimestres
@endsection

@section('contentheader_title', 'Registro del Quimestre')


@section('main-content')  
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
          <form action="{{ route('parciales.store2') }}" method="POST" id="f1" name="f1">
          
            
                     
                    <div class="tab-content">
                        <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">
                              Calculando Calificaciones del Quimestre: Nro. {{$quimestres->numero}} <br>
                              Estudiante: Curso:
                              </h3>
                            </div>
                              <div class="box-body">
                      @include('parciales.forms.quimestre-fields')
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
      </section>
    </div>
          
@stop
<script type="text/javascript">
  
function promediar2(){


      var examen_q=document.f1.examen_q;
      var examen_q2=document.f1.examen_q2;
      var examen_q20=document.f1.examen_q20;
      var avg_q_cuantitativa=document.f1.avg_q_cuantitativa;
      var avg_q_cuantitativa2=document.f1.avg_q_cuantitativa2;
      var avg_q_cualitativa=document.f1.avg_q_cualitativa;
      var avg_q_cualitativa2=document.f1.avg_q_cualitativa2;
      var sumatoria=document.f1.sumatoria;
      var sumatoria2=document.f1.sumatoria2;
      var avg_aprovechamiento_q=document.f1.avg_aprovechamiento_q;
      var avg_aprovechamiento_q2=document.f1.avg_aprovechamiento_q2;
      var avg_gp=document.f1.avg_gp;
      var avg_gp80=document.f1.avg_gp80;


      cuantos=examen_q.length;
     if(examen_q.length == undefined){ 

      examen_q.length = 1;
      examen_q2.length=1;
      examen_q20.length=1;
      avg_q_cuantitativa.length=1;
      avg_q_cuantitativa2.length=1;
      avg_q_cualitativa.length=1;
      avg_q_cualitativa2.length=1;
      avg_gp.length=1;
      avg_gp80.length=1;
      
    }

    if (examen_q.length==1) {
       if(examen_q.value>10){
                  alert('El valor debe ser menor de 10');
                  examen_q.value=1;
              }

                    if(examen_q.value == null || examen_q.value.length == 0 || /^\s*$/.test(examen_q.value) ){
                        examen_q.value=1;
                    }
                            var d=examen_q.value;
                            var gp=avg_gp.value;
                            var gp80=avg_gp80.value;


                          var p=(parseFloat(d) * 20)/100;//valor del examen en base a 20%
                         
                          var cuantitativa=p+ parseFloat(gp80); //valor del promedio cuantitativo por asignatura
                            
                           
                          cuantitativa=parseFloat(cuantitativa);

                           p =parseFloat(Math.round(p * 100) / 100).toFixed(2);
                           cuantitativa=parseFloat(Math.round(cuantitativa*100)/100).toFixed(2);
                           

                            examen_q2.value=p;
                            examen_q20.value=p;
                            avg_q_cuantitativa.value=cuantitativa;
                            avg_q_cuantitativa2.value=cuantitativa;
                           
                            //--------------------calculando nota cualitativa------------
                            if(cuantitativa>=1 && cuantitativa<=4){
                              avg_q_cualitativa.value="NAAR";
                              avg_q_cuantitativa2.value="NAAR";
                            }else{
                              if (cuantitativa>4 && cuantitativa<7) {
                                avg_q_cualitativa.value="PAAR";
                                avg_q_cualitativa2.value="PAAR";
                              } else{
                                if (cuantitativa>=7 && cuantitativa<9) {
                                  avg_q_cualitativa.value="AAR";
                                  avg_q_cualitativa2.value="AAR";
                                } else{
                                  if (cuantitativa>=9 && cuantitativa<=10) {
                                    avg_q_cualitativa.value="DAR";
                                    avg_q_cualitativa2.value="DAR";

                                  };
                                };
                              };
                            }
                            
                          }else{

    
      
      for (var i = 0; i < examen_q.length; i++) {
        
        
              if(examen_q[i].value>10){
                  alert('El valor debe ser menor de 10');
                  examen_q[i].value=1;
              }else{

                      if(examen_q[i].value == null || examen_q[i].value.length == 0 || /^\s*$/.test(examen_q[i].value) ){
                                      examen_q[i].value=1;
                                  }
                                    var d=examen_q[i].value;
                                    var gp=avg_gp[i].value;
                                    var gp80=avg_gp80[i].value;

                                  var p=(parseFloat(d)*20)/100;//valor del examen en base a 0%
                                  
                                  var cuantitativa=p+ parseFloat(gp80); //valor del promedio cuantitativo por asignatura
                                  cuantitativa=parseFloat(cuantitativa);

                                  p =parseFloat(Math.round(p * 100) / 100).toFixed(2);
                                  cuantitativa=parseFloat(Math.round(cuantitativa*100)/100).toFixed(2);
                                    examen_q2[i].value=p;
                                    examen_q20[i].value=p;
                                    avg_q_cuantitativa[i].value=cuantitativa;
                                    avg_q_cuantitativa2[i].value=cuantitativa;
                                   
                                    //--------------------calculando nota cualitativa------------
                                    if(cuantitativa>=1 && cuantitativa<=4){
                                      avg_q_cualitativa[i].value="NAAR";
                                      avg_q_cualitativa2[i].value="NAAR";
                                    }else{
                                      if (cuantitativa>4 && cuantitativa<7) {
                                        avg_q_cualitativa[i].value="PAAR";
                                        avg_q_cualitativa2[i].value="PAAR";
                                      } else{
                                        if (cuantitativa>=7 && cuantitativa<9) {
                                          avg_q_cualitativa[i].value="AAR";
                                          avg_q_cualitativa2[i].value="AAR";
                                        } else{
                                          if (cuantitativa>=9 && cuantitativa<=10) {
                                            avg_q_cualitativa[i].value="DAR";
                                            avg_q_cualitativa2[i].value="DAR";
                                          };
                                        };
                                      };
                                    }
                                    
                                  }
                              }//cierra el ciclo for
                          }//cierra el condicional


      //-------- calculando promedio de aproevchamiento----------------
      var suma=0;
      parseFloat(suma);
      if (avg_q_cuantitativa.length==1) {
        var valor=parseFloat(avg_q_cuantitativa.value);
        suma=parseFloat(valor)+suma;

      } else{
        for (var x = 0; x< avg_q_cuantitativa.length; x++) {

        var valor=parseFloat(avg_q_cuantitativa[x].value);
        suma=parseFloat(valor)+suma;

      };  
      };

      suma=parseFloat(Math.round(suma * 100) / 100).toFixed(2);

      sumatoria.value=suma;
      sumatoria2.value=suma;

      suma=suma/parseInt(avg_q_cuantitativa.length);
       

       
       //alert(''+suma);
       avg_aprovechamiento_q.value=suma;
       avg_aprovechamiento_q2.value=suma;




}

</script>