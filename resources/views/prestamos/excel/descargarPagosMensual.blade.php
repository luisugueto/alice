<table>
    <tr>
        <td colspan="7" style="text-align:center">
            <b>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR</b>
        </td>
    </tr>
    <tr>
        <td colspan="7" style="text-align:center">
            <b><h3>"MARIA MONTESSORI"</h3></b>
        </td>
    </tr>        
    <tr>
        <td colspan="7" style="text-align:center">
            FLORIDA NORTE COOP UNIDOS SOMOS MAS MZ 385 SI 22
        </td>
    </tr>
    
    <tr>
        <td colspan="7" style="text-align:center">
            LISTADO DE PAGOS MENSUAL
        </td>
    </tr>
</table>

<table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <td>Fechas</td>
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Tipo</td>
                                        <td>Monto Prestamo</td>
                                        <td>Monto Deudor</td>
                                        <td></td>
                                        <td>MONTO TOTAL DE PRESTAMOS</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                            
                                   @foreach($prestamo as $per)
                                   <?php $i = 0; $monto = 0;
                                            foreach ($per->pagosrealizados as $key) {
                                                $i += $key->monto_pagado;
                                                $monto = $key->monto_adeudado;
                                            }

                                        ?>
                                    <tr>
                                        <td>{{$per->fecha }}</td>
                                        <td>{{$per->personal->nombres}}</td>
                                        <td>{{$per->personal->apellido_paterno}} {{ $per->personal->apellido_materno }}</td>
                                        <td>{{$per->tipo}}</td>
                                        <td>{{$per->monto }}</td>
                                @if($per->tipo == 'Prestamo')
                                    @if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                                        <td>0</td>
                                        <td></td>
                                        @else
                                            <td></td>
                                            <td></td>
                                    @endif    

                                        <td>{{ $total }}</td>
                                @endif                                     
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>

