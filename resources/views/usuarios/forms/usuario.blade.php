<div class="form-group">
	{!! Form::label('Nombre', 'Nombre') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Nombre']) !!}
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
	{!! Form::select('roles_id', $roles, null, ['class'=>'form-control']) !!}
</div> 