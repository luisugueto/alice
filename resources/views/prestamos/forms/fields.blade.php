<div class="form-group">
              {!! Form::label('Personal', 'Personal') !!}
              <select name="personal" required class="form-control select">
                    @foreach($personal as $per)
                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }}</option>
                    @endforeach
              </select>
            </div>
            <div class="form-group">
              {!! Form::label('Tipo', 'Tipo') !!}
              {!! Form::select('tipo', array('P' => 'Prestamo', 'A' => 'Anticipo'), null, ['class' => 'form-control', 'required','title' => 'Introduzca el Tipo', 'placeholder' => 'Seleccione']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('Monto', 'Monto') !!}
              {!! Form::number('monto', null, ['required','class' => 'form-control', 'title' => 'Introduzca el Sueldo Mensual?:', 'placeholder' => 'Ejm: 300.00']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('Motivo', 'Motivo') !!}
              {!! Form::textarea('motivo', null, ['minlength'=>'10','class' => 'form-control', 'title' => 'Introduzca el Motivo', 'placeholder' => 'Ejm: Deudas', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
            </div>