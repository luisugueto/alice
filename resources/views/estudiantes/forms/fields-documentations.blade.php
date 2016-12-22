<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('codigo', 'Codigo') !!}
		{!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'DOC-0001', 'Introduzca el codigo del documento']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('digitalizado', 'Digitalizado') !!}
		{!! Form::file('digitalizado', null, ['class' => 'form-control']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('titulo', 'Título') !!}
		{!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Acta de nacimiento', 'title' => 'Introduzca el título del documento']) !!}
	</div>
</div>
<div class="col-md-4">
	<div class="form-group">
		{!! Form::label('entregado', 'Entregado') !!}
		{!! Form::date('entregado', null, ['class' => 'form-control', 'title' => 'Fecha de entrega del documento']) !!}
	</div>
</div>