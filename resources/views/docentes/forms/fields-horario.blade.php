<div class="control-group">
    {!! Form::label('periodo', 'Periodo', ['class' => 'control-label']) !!}
    <div class="controls">
       {!! Form::select('periodo', $periodos, null, ['class' => 'form-control', 'placeholder' => 'SELECCIONE', 'required' => 'required']) !!}
    </div>
</div>

@if(!empty($periodo))

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

                            </td>
                        @endif
                    @endfor
                </tr>
            @endif
        @endfor
        </tbody>
    </table>


@endif