<div class="form-group">
            {!! Form::label('Nombre', 'Nombre') !!}
            {!! Form::text('name', null, ['required','class'=>'form-control','placeholder'=>'Ingresa Nombre']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Correo', 'Correo') !!}
            {!! Form::email('email', null, ['required', 'class'=>'form-control','placeholder'=>'Ingresa Correo']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Nombre', 'Foto') !!}
            {!! Form::file('foto')!!}
          </div>
          <div class="form-group">
            {{ Form::label('Editar', 'Editar Contraseña') }}
            <input type="checkbox" id="verificarr" name="verificar" onclick="verifica()">
          </div>
      <div id="ocultar" style="display:none;">
          <div class="form-group">
            {!! Form::label('Nombre', 'Nueva Contraseña') !!}
            {!! Form::password('nueva', ['id'=>'confirmar','class'=>'form-control','placeholder'=>'Nueva Contraseña']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('Nombre', 'Confirmar Contraseña') !!}
            {!! Form::password('confirmar', ['id'=>'confirmar1','class'=>'form-control','placeholder'=>'Confirmar Contraseña']) !!}
          </div>
          <br>
      </div>