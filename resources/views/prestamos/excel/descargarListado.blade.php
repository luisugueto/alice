 <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                        <td>Fecha</td>
                                        <td>Nombres</td>
                                        <td>Apellidos</td>
                                        <td>Tipo</td>
                                        <td>Monto Prestamo</td>
                                        <td>Monto Deudor</td>
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
                                        @else
                                            <td></td>
                                    @endif    
                                @endif                                     
                                    </tr>
                                    
                                    @endforeach
                            </tbody>
                         </table>