<div class="control-group">
	{!! Form::label('Nombre', 'Nombre(s)', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'JESÚS EDUARDO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
	</div>
</div>
<div class="control-group">
	{!! Form::label('Email', 'Correo Electrónico', ['class'=>'control-label']) !!}
	<div class="controls">
		{!! Form::text('email', null, ['class' => 'input-xlarge', 'placeholder'=>'ejemplo@ejemplo.com']) !!} 
	</div>
</div>

<div class="control-group">
	{!! Form::label('Roles', 'Roles', ['class'=>'control-label']) !!}
	<div class="controls">
		<select name="roles_id" class="input-xlarge select">
			<option disabled selected>Seleccione</option>
				@foreach($roles as $r)
					<option value="{{ $r->id }}">{{ $r->nombre }}</option>
				@endforeach
		</select>
	</div>
</div>

<div class="control-group">
	{{ Form::label('Contraseña', 'Contraseña', ['class'=>'control-label']) }}
	<div class="controls">
		{{ Form::password('password', ['class'=>'input-xlarge', 'required']) }}
	</div>
</div>