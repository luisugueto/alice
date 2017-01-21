{{-- campos ocultos	 --}}


{!!  Form::hidden('id_estudiante',$estudiante->id) !!}
{!!  Form::hidden('id_recuperativo',$id_recuperativo) !!}

<div class="control-group">
	{!! Form::label('Recuperativo', $tipo, ['class'=>'control-label']) !!}
	
</div>

<div class="control-group">
	{{ Form::label('Calificacion', 'Nueva Calificación', ['class'=>'control-label']) }}
	<div class="controls">
	{!! Form::number('calificacion',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación del Recuperativo', 'min' => '1', 'max' => '10', 'required' => 'required', 'id' => 'individuales', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);'])!!} 
	</div>
</div>