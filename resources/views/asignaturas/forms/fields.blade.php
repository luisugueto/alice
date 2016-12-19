<div class="form-group">
            {!! Form::label('Asignatura', 'Asignatura') !!}
            {!! Form::text('asignatura', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Literal']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Curso', 'Curso') !!}
            {!! Form::select('id_curso', $curso, null, ['class'=>'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Optativo') !!}
            {{ Form::select('optativo', array('Y'=>'Si', 'N'=>'No'), null, ['class'=>'form-control']) }}
          </div>