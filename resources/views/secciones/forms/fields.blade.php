<div class="control-group">
	{!! Form::label('Nombre', 'Literal', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'input-xlarge','placeholder'=> 'A','title' => 'Ingrese el literal o el número de la sección', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('Capacidad', 'Capacidad de Estudiantes', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::number('capacidad', null, ['required','title' => 'Ingrese la capacidad máxima de estudiantes que puede recibir esta sección','class'=>'input-xlarge', 'placeholder'=> '30']) !!} 
	</div>
</div>
<div class="control-group">
	{!! Form::label('Curso', 'Curso', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::select('id_curso', $cursos, null, ['class'=>'input-xlarge', 'placeholder' => 'Seleccione','title' => 'Seleccione el curso al cual desea crearle la sección']) !!} 
	</div>
</div>