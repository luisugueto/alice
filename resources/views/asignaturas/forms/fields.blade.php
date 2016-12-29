<div class="form-group">
	{!! Form::label('Asignatura', 'Asignatura') !!} <small class="text-red">*</small>
	{!! Form::text('asignatura', null, ['required', 'class'=>'form-control','placeholder' => 'Matemáticas', 'title' => 'Introduzca el nombre de la asignatura', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
<div class="form-group">
	{!! Form::label('Curso', 'Curso') !!} <small class="text-red">*</small>
	{!! Form::select('id_curso', $curso, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('Optativo') !!} <small class="text-red">*</small>
	{!! Form::select('optativo', array('Y'=>'Si', 'N'=>'No'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione']) !!}
</div>