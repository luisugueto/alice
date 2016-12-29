<div class="form-group">
	{!! Form::label('Nombre', 'Literal') !!} <small class="text-red">*</small>
	{!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'form-control','placeholder'=> 'A','title' => 'Ingrese el literal o el número de la sección', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
<div class="form-group">
	{!! Form::label('Capacidad', 'Capacidad de Estudiantes') !!} <small class="text-red">*</small>
	{!! Form::number('capacidad', null, ['required','title' => 'Ingrese la capacidad máxima de estudiantes que puede recibir esta sección','class'=>'form-control', 'placeholder'=> '30']) !!} 
</div>
<div class="form-group">
	{!! Form::label('Curso', 'Curso') !!} <small class="text-red">*</small>
	{!! Form::select('id_curso', $cursos, null, ['class'=>'form-control', 'placeholder' => 'Seleccione','title' => 'Seleccione el curso al cual desea crearle la sección']) !!} 
</div>