<div class="form-group">
							{!! Form::label('Nombre', 'Literal/Número') !!}
							{!! Form::text('literal', null, ['required', 'maxlength'=>2, 'class'=>'form-control','placeholder'=>'Ingresa Literal','title' => 'Ingrese el literal o el número de la sección']) !!}
					  	</div>
					  	<div class="form-group">
							{!! Form::label('Capacidad', 'Capacidad de Estudiantes') !!}
							{!! Form::text('capacidad', null, ['required','title' => 'Ingrese la capacidad máxima de estudiantes que puede recibir esta sección','class'=>'form-control', 'placeholder'=>'Ingresa Capacidad']) !!} 
					  	</div>
					  	<div class="form-group">
							{!! Form::label('Curso', 'Curso') !!}
							{!! Form::select('id_curso', $cursos, null, ['class'=>'form-control','title' => 'Seleccione el curso al cual desea crearle la sección']) !!} 
					  	</div>