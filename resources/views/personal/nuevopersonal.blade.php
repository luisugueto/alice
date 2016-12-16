@extends('layouts.app')

@section('htmlheader_title')
    Nuevo Usuario
@endsection


@section('main-content')                    
            <div class="col-md-12">
    @include('alerts.request')
                        <h2 class="titulo">
                            Nuevo Personal
                        </h2>
                        <small><p>Debe llenar todos los campos de las distintas ventanas.</p></small>
                        <hr>
                    <ul class="nav nav-tabs">
                      <li class="active li"><a data-toggle="tab" href="#generales">Datos Generales</a></li>
                      <li class="li"><a data-toggle="tab" href="#academica">Información Académica</a></li>
                      <li class="li"><a data-toggle="tab" href="#remuneracion">Remuneración</a></li>
              
                    </ul>

                    <form action="{{ route('personal.store') }}" method="POST">
                      <input type="hidden" name="_token" value="{{ CSRF_TOKEN()}}">

                  

                    <div class="tab-content">
                      <div id="generales" class="tab-pane fade in active">
                        <h3>Datos Generales</h3><br>
                        <table class="table">
                          <tr>
                            <th style="text-align: right">Codigo Personal: </th>
                            <td><input type="text" name="codigo" required class="form-control"></td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Nombres: </th>
                            <td><input type="text" name="nombres" required class="form-control"></td>
                          </tr>
                          <tr colspan="2">
                            <th style="text-align: right">Apellido Paterno: </th>
                            <td><input type="text" name="apellidop" required class="form-control"></td>
                            <th style="text-align: right">Apellido Materno: </th>
                            <td><input type="text" name="apellidom" required class="form-control"></td>
                          </tr>
                          <tr colspan="2">
                            <th style="text-align: right">Nº de Cédula de Id.: </th>
                            <td><input type="number" name="cedula" required class="form-control"></td>
                            <th style="text-align: right">Edad: </th>
                            <td><input type="number" name="edad" required class="form-control"></td>
                          </tr>
                          <tr colspan="2">
                            <th style="text-align: right">Fecha de Nacimiento: </th>
                            <td><input type="date" name="nacimiento" required class="form-control"></td>
                            <th style="text-align: right">Fecha de Ingreso: </th>
                            <td><input type="date" name="ingreso" required class="form-control"></td>
                          </tr>
                          <tr colspan="2">
                            <th style="text-align: right">Sexo: </th>
                            <td><select class="form-control" name="sexo">
                              <option value="m">Masculino</option>
                              <option value="f">Femenino</option>
                            </select></td>
                            <th style="text-align: right">Estado Civil: </th>
                            <td><select class="form-control" name="ecivil">
                              <option value="casado">Casado(a)</option>
                              <option value="viudo">Viudo(a)</option>
                              <option value="soltero">Soltero(a)</option>
                            </select></td>
                          </tr>
                          <tr colspan="2">
                            <th style="text-align: right">Estado Actual: </th>
                             <td><select class="form-control" name="eactual">
                              <option value="c">Casado(a)</option>
                              <option value="v">Viudo(a)</option>
                              <option value="s">Soltero(a)</option>
                            </select></td>
                            <th style="text-align: right">Tipo de Registro: </th>
                             <td><select name="tiporeg" required class="form-control select">
                                                 <option  disabled selected>Seleccione</option>
                                                 @foreach($tipo as $tip)
                                                    <option value="{{ $tip->id }}">{{ $tip->tipo_empleado }}</option>
                                                 @endforeach
                                             </select>
                              </td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Especialidad: </th>
                            <td><input type="text" name="especialidad" required class="form-control"></td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Dirección: </th>
                            <td><input type="text" name="direccion" required class="form-control"></td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Teléfono: </th>
                            <td><input type="text" name="telefono" required class="form-control"></td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Correo: </th>
                            <td><input type="email" name="correo" required class="form-control"></td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Cargo: </th>
                            <td><select name="cargo" required class="form-control select">
                                                 <option  disabled selected>Seleccione</option>
                                                 @foreach($cargo as $car)
                                                    <option value="{{ $car->id }}">{{ $car->nombre }}</option>
                                                 @endforeach
                                             </select>
                              </td>
                          </tr>
                          <tr>
                            <th style="text-align: right">Clave para Procesos: </th>
                            <td><input type="text" name="clave" required class="form-control"></td>
                          </tr>

                        </table>
                      </div>
                
                      <div id="academica" class="tab-pane fade" align="left">
                          <h3>Información Académica</h3>
                          <table class="table" align="left">
                            <tr>
                              <th style="text-align: right">Donde Terminó la Primaria?: </th>
                              <td><input type="text" name="primaria" required class="form-control"></td>
                            </tr>
                             <tr>
                              <th style="text-align: right">Donde Terminó la Secundaria?: </th>
                              <td><input type="text" name="secundaria" required class="form-control"></td>
                            </tr>
                             <tr>
                              <th style="text-align: right">Donde Terminó Instr. Superior?: </th>
                              <td><input type="text" name="superi" required class="form-control"></td>
                            </tr>
                             <tr>
                              <th style="text-align: right">Título(s) Académico(s) Obtenido(s): </th>
                              <td><input type="text" name="titulos" required class="form-control"></td>
                            </tr>
                             <tr>
                              <th style="text-align: right">Cursos y Seminarios: </th>
                              <td><textarea name="cursos" cols="30" rows="5" class="form-control"></textarea></td>
                            </tr>
                             <tr>
                              <th style="text-align: right">Historia Laboral: </th>
                              <td><textarea name="historia" cols="30" rows="5" class="form-control"></textarea></td>
                            </tr>
                          </table>
                          
                      </div>
                      <div id="remuneracion" class="tab-pane fade">
                          <h3>Remuneración</h3>
                          <table class="table" align="left">
                           
                            <tr>
                               <td>Sueldo 1era Quincena: <input type="text" name="prQuincena" class="form-control"></td>
                            </tr>
                            <tr>
                               <td>Sueldo 2da Quincena: <input type="text" name="seQuincena" class="form-control"></td>
                            </tr>
                            <tr>
                               <td>Sueldo Mensual:<input type="text" name="sueldoMensual" class="form-control"></td>
                            </tr>
                            <tr>
                               <td>% IESS Patronal:<input type="text" name="ieePatronal" class="form-control"></td>
                                 
                            </tr>
                            <tr>
                               <td>% IESS Personal:<input type="text" name="ieePersonal" class="form-control"></td>
                              
                            </tr>
                            <tr>
                              <td><input type="checkbox">Descuenta el IESS Sobre:<input type="text" name="descuento" class="form-control"></td>
                            </tr>
                            </tr>
                            <tr>
                             <td><input type="checkbox">Se paga horas extras al Colaborador:<input type="text" name="horasExtras" class="form-control"></td>
                              <td><input type="checkbox">Devolver fondos de reserva en rol de colaborador:<input type="text" name="devolverFondos" class="form-control"></td>
                            </tr>
                            <tr>
                             <td>BONO RESPONSABILIDAD:<input type="text" name="bono" class="form-control"></td>
                              <td>Cuenta Bancaria(Para Nomina)<input type="text" name="cuenta" class="form-control"></td>
                            </tr>
                          </table>
                      </div>
  
              
                    </div>
                        
                                              
                        <div align="center">
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Aceptar">
                            </div>
                        </div>
                        </form>
                    </div>
@stop