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
            CONTROL DE PAGOS MENSUAL
        </td>
    </tr>
</table>

<table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <td>Nombre y Apellido</td>
                                        <td>Cedula</td>
                                        <td>Cargo</td>
                                        <td>Area de Trabajo</td>
                                        <td>Capital</td>
                                        <td>Prestamos y Anticipos</td>
                                        <td>Minutos de Retardo Asistencia</td>
                                        <td>Pago Total</td>
                                    </tr>
                            </thead>
                            <tbody align="center">
                                
                                @foreach($personal as $per)
                                    <tr>
                                        <td>{{$per->nombres}} {{$per->apellido_paterno}}</td>
                                        <td>{{$per->cedula}}</td>
                                        <td>{{$per->cargo->nombre}}</td>
                                        <td>{{$per->cargo->area->nombre}}</td>
                                        <td>{{ remuneracion($per->id) }}</td>
                                        <td>{{ totalPrestamos($per->id) }}</td>
                                        <td>{{ retardoAsistencia($per->id) }}</td>
                                        <td>{{ remuneracion($per->id)-totalPrestamos($per->id) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>