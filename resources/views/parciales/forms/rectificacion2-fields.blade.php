{{-- campos ocultos	 --}}
{!! Form::hidden('id_quimestrales',$quimestrales->id) !!}

{!!  Form::hidden('id_estudiante',$quimestrales->id_estudiante) !!}
<div class="control-group">
	{!! Form::label('Asignaturas', 'Asignaturas', ['class'=>'control-label']) !!}
	<div class="controls">
		<select name="id_asignatura" class="input-xlarge select">
			

				@foreach($asignaturas as $asig)
					
					@foreach($mis_asignaturas as $mis)
					@if($asig->id == $mis->id_asignatura)

					<option value="{{ $asig->id }}">{{ $asig->asignatura }}</option>
					@endif
					@endforeach
				@endforeach
		</select>
	</div>
</div>


<div class="control-group">
	{{ Form::label('Calificacion', 'Nueva Calificación del Examen', ['class'=>'control-label']) }}
	<div class="controls">
	{!! Form::number('calificacion',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la nueva calificación de la categoria para esta asignatura seleccionada', 'min' => '1', 'max' => '10', 'required' => 'required', 'id' => 'individuales', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])!!} 
	</div>
</div>