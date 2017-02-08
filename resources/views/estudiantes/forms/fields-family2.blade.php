<div class="span11">
    @if(empty($madre))
        <div class="span4">
            <div class="control-group">
                {!! Form::label('nacionalidad_ma', 'Nacionalidad', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nacionalidad_ma') ? ' has-error' : '' }}">
                    <select name="nacionalidad_ma" id="padre2" disabled="disabled" title="Seleccioné la nacionalidad" class="chzn-select" style="width: 50px">
                        <option value="N-">N</option>
                        <option value="E-">E</option>
                    </select>

                    <span class="help-inline"><input type="checkbox" onclick="padre_ch2()" id="habilitar2" name="padre2"></span>
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('cedula_ma', 'Cédula', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('cedula_ma') ? ' has-error' : '' }}">
                    {!! Form::text('cedula_ma', null, ['class' => 'form-control', 'title' => 'Ingrese el número de cédula de la madre.', 'placeholder' => '25607932', 'size' => '36', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nombres_ma', 'Nombres', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nombres_ma') ? ' has-error' : '' }}">
                    {!! Form::text('nombres_ma', null, ['class' => 'form-control', 'placeholder' => 'Jésus Eduardo', 'title' => 'Introduzca los nombres del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('telefono_ma', 'Teléfono', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('telefono_ma') ? ' has-error' : '' }}">
                    {!! Form::text('telefono_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca el teléfono del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nivel_educacion_ma', 'Educación', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::select('nivel_educacion_ma', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('correo_ma', 'Correo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('correo_ma') ? ' has-error' : '' }}">
                    {!! Form::email('correo_ma', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@ejemplo.com', 'title' => 'Introduzca el correo del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('lugar_trabajo_ma', 'Lugar trabajo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('lugar_trabajo_ma') ? ' has-error' : '' }}">
                    {!! Form::textarea('lugar_trabajo_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección de trabajo del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('direccion_ma', 'Dirección', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('direccion_ma') ? ' has-error' : '' }}">
                    {!! Form::textarea('direccion_ma', null, ['class' => 'form-control', 'placeholder' => '', 'title' => 'Introduzca la dirección del padre o madre', 'rows' => '3', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
    @else
        <div class="span4">
            <div class="control-group">
                {!! Form::label('cedula_ma', 'Cédula', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('cedula_ma') ? ' has-error' : '' }}">
                    {!! Form::text('cedula_ma', $madre->cedula_pa, ['class' => 'form-control', 'placeholder' => '1784559961', 'tittle' => 'Introduzca la cédula del padre o madre', 'onkeyup' => 'javascript:this.value=this.value.toUpperCase()', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nombres_ma', 'Nombres', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('nombres_ma') ? ' has-error' : '' }}">
                    {!! Form::text('nombres_ma', $madre->nombres_pa, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('telefono_ma', 'Teléfono', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('telefono_ma') ? ' has-error' : '' }}">
                    {!! Form::text('telefono_ma', $madre->telefono_pa, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('nivel_educacion_ma', 'Educación', ['class' => 'control-label']) !!}
                <div class="controls">
                    {!! Form::select('nivel_educacion_ma', array('Educación General Básica' => 'Educación General Básica', 'Bachillerato General Unificado' => 'Bachillerato General Unificado', 'Universidad' => 'Universidad'), $madre->nivel_educacion, ['class' => 'form-control', 'tittle' => 'Seleccione el nivel de educación del padre o madre', 'id' => 'padre2', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('correo_ma', 'Correo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('correo_ma') ? ' has-error' : '' }}">
                    {!! Form::email('correo_ma', $madre->correo_pa, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                {!! Form::label('lugar_trabajo_ma', 'Lugar trabajo', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('lugar_trabajo_ma') ? ' has-error' : '' }}">
                    {!! Form::textarea('lugar_trabajo_ma', $madre->lugar_trabajo, ['class' => 'form-control', 'rows' => '3', 'disabled' => 'disabled']) !!}
                </div>
            </div>
            <div class="control-group">
                {!! Form::label('direccion_ma', 'Dirección', ['class' => 'control-label']) !!}
                <div class="controls{{ $errors->has('direccion_ma') ? ' has-error' : '' }}">
                    {!! Form::textarea('direccion_ma', $madre->direccion_pa, ['class' => 'form-control', 'rows' => '3',  'disabled' => 'disabled']) !!}
                </div>
            </div>
        </div>
        {!! Form::hidden('madre_id', $madre->id) !!}
    @endif
</div>