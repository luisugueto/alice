<div class="form-group">
	{!! Form::label('Nombre', 'Nombre') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Nombre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()']) !!}
</div>
<div class="form-group">
	{!! Form::label('Email', 'Email') !!}
	{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Correo']) !!} 
</div>
<div class="form-group">
	{!! Form::label('Password', 'Password') !!}
	<input type="password" class="form-control" placeholder="Ingresa Contraseña">
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