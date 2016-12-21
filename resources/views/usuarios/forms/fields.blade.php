<div class="form-group">
	{!! Form::label('Nombre', 'Nombre(s)') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'JESÚS EDUARDO', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
<div class="form-group">
	{!! Form::label('Email', 'Correo Electrónico') !!}
	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'ejemplo@ejemplo.com']) !!} 
</div>
<div class="form-group">
	{!! Form::label('Password', 'Contraseña') !!}
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
</div>
<div class="form-group">
	{!! Form::label('Roles', 'Roles') !!}
	<select name="roles_id" class="form-control select">
		<option disabled selected>Seleccione</option>
		@foreach($roles as $r)
			<option value="{{ $r->id }}">{{ $r->nombre }}</option>
		@endforeach
	</select>
</div>