
    <div class="row-fluid">
        <div class="span4" style="padding-left: 50px; text-align: center">

            @if(empty($estudiante->foto))
                <img src="{{ asset('img/avatar6.png') }}" width="200px" height="200px">
            @else
                <img src="{{ asset('img/' . $estudiante->foto) }}" width="200px" height="200px">
            @endif
            <br><br>
                <button type="button" class="btn btn-large btn-block"> {{ $estudiante->codigo_matricula }}</button>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2">DATOS MEDICOS</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        GRUPO SANGUINEO
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->grupo_sanguineo }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        PESO
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->peso }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        ALTURA
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->altura }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        CAPACIDAD ESPECIAL
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->capacidad_especial }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        DISCAPACIDAD
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->porcentaje_discapacidad }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        MEDICINAS CONTRA INDICADAS
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->medicinas_contraindicadas }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        ALERGICO
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->alergico_a }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        PATOLOGIA
                    </td>
                    <td>
                        <code>{{ $estudiante->medicos->patologia }}</code>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="span8">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th colspan="2">INFORMACIÓN PERSONAL</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        REPRESENTANTE
                    </td>
                    <td>
                        <code>{{ $estudiante->representante->nombres_re }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        CÉDULA
                    </td>
                    <td>
                        <code>{{ $estudiante->nacionalidad_ced.$estudiante->cedula }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        FECHA DE REGISTRO
                    </td>
                    <td>
                        <code>{{ $estudiante->fecha_registro }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        GÉNERO
                    </td>
                    <td>
                        <code>{{ $estudiante->genero }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        ESTADO ACTUAL
                    </td>
                    <td>
                        <code>{{ strtoupper($estudiante->estado_actual) }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        TIPO DE REGISTRO
                    </td>
                    <td>
                        <code>{{ $estudiante->tipo_registro }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        DIRECCIÓN
                    </td>
                    <td>
                        <code>{{ $estudiante->direccion }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        NACIONALIDAD
                    </td>
                    <td>
                        <code>{{ $estudiante->nacionalidad }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        PROVINCIA
                    </td>
                    <td>
                        <code>{{ $estudiante->provincia }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        CIUDAD
                    </td>
                    <td>
                        <code>{{ $estudiante->ciudad_natal }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        TELÉFONO
                    </td>
                    <td>
                        <code>{{ $estudiante->telefono }}</code>
                    </td>
                </tr>
                <tr>
                    <td>
                        CORREO ELECTRÓNICO
                    </td>
                    <td>
                        <code>{{ $estudiante->correo }}</code>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th colspan="2">PADRES</th>
                    </tr>
                    </thead>
                <tbody>
                @if(empty($estudiante->padres()->exists()))
                    <tr>
                        <td colspan="2">
                           NINGUNO
                        </td>
                    </tr>
                @else
                    @foreach($estudiante->padres()->get() as $padre)
                        <tr>
                            <td>
                                NOMBRE
                            </td>
                            <td>
                                <code>{{ $padre->nombres_pa }}</code>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TELEFÓNO
                            </td>
                            <td>
                                <code>{{ $padre->telefono_pa }}</code>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
