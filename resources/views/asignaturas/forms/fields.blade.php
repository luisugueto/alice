<div class="control-group">
	{!! Form::label('Asignatura', 'Asignatura', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::text('asignatura', null, ['required', 'class'=>'input-xlarge','placeholder' => 'Matemáticas', 'title' => 'Introduzca el nombre de la asignatura', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('Curso', 'Curso', ['class'=>'control-label']) !!} 
	<div class="controls">
		{!! Form::select('id_curso', $curso, null, ['class'=>'input-xlarge']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('Optativo', 'Optativo', ['class'=>'control-label']) !!} 
	<div class="controls">
		{!! Form::select('optativo', array('Y'=>'Si', 'N'=>'No'), null, ['class'=>'input-xlarge', 'placeholder' => 'Seleccione']) !!}
	</div>
</div>