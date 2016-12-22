<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('cursos', 'Cursos') !!}
		{!! Form::select('id_curso', $cursos, null, ['class' => 'form-control', 'id' => 'cursos', 'placeholder' => 'Seleccione', 'title' => 'Seleccione el curso para mostrar los rubros correspondientes']) !!}
	</div>
</div>