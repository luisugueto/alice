@extends('layouts.app')

@section('contentheader_title', 'Horario')
@section('contentheader_description', 'Curso')

@section('main-content') 
<div class="col-md-12">
   
    <div class="row" style="padding-top: 20px;">
        @include('alerts.request')
        @include('alerts.errors')
    </div>
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Curso: {{ $curso->curso }}</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div class="box-body no-padding">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="7" class="text-center"> DÍAS</th>
                                                </tr>
                                                <tr>
                	                                <th class="text-center" colspan="2"> HORA </th>
                	                                    @foreach($dias as $dia)
	                  	                                    <th class="text-center"> {{ $dia->dia }}</th>
                	                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
            	
                                            	@for($i = 0; $i < 9; $i++)
                                                    @if($i == 4)
                                                        <tr>    
                                                            <th class="text-center" colspan="7"> RECREO </th>
                                                        </tr>   
                                                    @else
                                    					<tr>
                                    						<td colspan="2" class="text-center"> {{ $horas[$i]->bloque }} </td>
                                    						
                                                            @for($j=0; $j < 5; $j++) 
                                                                
                                                                @if($i == 0)
                                                                    <th class="text-center"> SALUDO</th>
                                                                
                                                                @else
                                                                    <td class="text-center text-red"> 
                                                                    
                                                                    @if(asignados($bloques2[$i][$j]->id,$bloques_asignados))  

                                                                        {{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }}
                                                                    
                                                                    @endif

                                                                @endif
                                                            
                                                            @endfor
                                                            </td>
                                    					</tr>
                                                    @endif
                                				@endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
@endsection