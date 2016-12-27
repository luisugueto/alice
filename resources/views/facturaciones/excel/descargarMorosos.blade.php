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
            LISTADO TOTAL DE MOROSOS
        </td>
    </tr>
</table>

<table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre(s)</th>
                                    <th>Teléfono</th>
                                    <th>Estudiante</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($morosos as $key => $morosos)
                                    <tr>
                                        <td>{{$morosos->cedula_re}}</td>
                                        <td>{{$morosos->nombres_re}}</td>
                                        <td>{{$morosos->telefono_re}}</td> 
                                        <td>{{$morosos->nombres}}</td> 
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>  