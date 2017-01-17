<div class="span11">
    @if(empty($padre))
        <div class="span4">
            <div class="control-group">
                {!! Form::label('nacionalidad_pa', 'Nacionalidad', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nacionalidad_pa') ? ' has-error' : '' }}">
                    <select name="nacionalidad_pa" id="padre" disabled="disabled" title="Seleccioné la nacionalidad" class="chzn-select" style="width: 50px">
                        <option value="N-">N</option>
                        <option value="E-">E</option>
                    </select>

                    <span class="help-inline"><input type="checkbox" onclick="padre_ch()" id="habilitar" name="padre"/></span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="select01">Cédula</label>
                <div class="controls{{ $errors->has('cedula_re') ? ' has-error' : '' }}">
                    {!! Form::text('cedula_pa', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula del padre.', 'id' => 'padre', 'placeholder' => '25607932', 'size' => '40', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nombres_pa', 'Nombres', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nombres_pa') ? ' has-error' : '' }}">
                    {!! Form::text('nombres_pa', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('telefono_pa', 'Teléfono', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('telefono_pa') ? ' has-error' : '' }}">
                    {!! Form::text('telefono_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nivel_educacion', 'Educación', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::select('nivel_educacion', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('correo_pa', 'Correo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('correo_pa') ? ' has-error' : '' }}">
                    {!! Form::email('correo_pa', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                {!! Form::label('lugar_trabajo', 'Lugar trabajo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('lugar_trabajo') ? ' has-error' : '' }}">
                    {!! Form::textarea('lugar_trabajo', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('direccion_pa', 'Dirección', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('direccion_pa') ? ' has-error' : '' }}">
                    {!! Form::textarea('direccion_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
	@else
        <div class="span4">
            <div class="control-group">
                {!! Form::label('cedula_pa', 'Cédula', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('cedula_pa') ? ' has-error' : '' }}">
                    {!! Form::text('cedula_pa', $padre->cedula_pa, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nombres_pa', 'Nombres', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nombres_pa') ? ' has-error' : '' }}">
                    {!! Form::text('nombres_pa', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('telefono_pa', 'Teléfono', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('telefono_pa') ? ' has-error' : '' }}">
                    {!! Form::text('telefono_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nivel_educacion', 'Educación', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::select('nivel_educacion', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('correo_pa', 'Correo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('correo_pa') ? ' has-error' : '' }}">
                    {!! Form::email('correo_pa', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="control-group">
                {!! Form::label('lugar_trabajo', 'Lugar trabajo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('lugar_trabajo') ? ' has-error' : '' }}">
                    {!! Form::textarea('lugar_trabajo', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('direccion_pa', 'Dirección', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('direccion_pa') ? ' has-error' : '' }}">
                    {!! Form::textarea('direccion_pa', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
    @endif
</div>
