<div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('nombre', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Area', 'Area de Trabajo') !!}
            {!! Form::select('area', $area, null, ['class'=>'form-control']) !!}
          </div>