<div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Personal</h3>
                        </div>
                        <div class="box-body">
                            
                            <div class="form-group">
              {!! Form::label('Personal', 'Personal') !!}
              <select name="id_personal" required class="form-control select">
                    @foreach($personal as $per)
                        <option value="{{ $per->id }}">{{ $per->nombres }} {{ $per->apellido_paterno }} - {{ $per->cargo->nombre }}</option>
                    @endforeach
              </select>
            </div>