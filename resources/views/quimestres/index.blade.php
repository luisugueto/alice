@extends('layouts.app')

@section('contentheader_title', 'Quimestres')
@section('contentheader_description', 'Inicio')


@section('main-content')                    
<div class="col-md-12">
    <div class="col-md-12">
        <div class="row" style="padding-top: 10px;">
            @include('alerts.request')
            @include('alerts.errors') 
        </div>  
    </div> 
    <section class="content">
        <div class="row">
            <div class="col-md-12" style="padding-top: 20px">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Quimestres</h3>
                    </div>
                    <div class="box-body">
                    {!! Form::open(['route' => 'quimestres.store', 'method' => 'POST', 'name' => 'f1', 'id' => 'f1']) !!}
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fech de Inicio</th>
									<th>Fecha de Fin</th>
									<th>Número</th>
									<th>Periodo</th>
									<th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quimestres as $quimestres)
								<tr>
									
									<td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->inicio}}</a></td>
									<td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->fin}}</a></td>
									<td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->numero}}</a></td>
									<td><a href="{{ route('quimestres.edit', [$quimestres->id]) }}"> {{$quimestres->periodos->nombre}}({{$quimestres->periodos->status}})</a></td>
									
									<td>
									<div class="btn-group">
										 {!!link_to_route('quimestres.edit', $title = '', $parameters = $quimestres->id, $attributes = ['class'=>'fa fa-edit fa-2x'])!!}

											<a href="{{ route('quimestres.destroy', [$quimestres->id]) }}"><button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" title="Presionando este botón puede eliminar el registro" ><i class="fa fa-trash"></i></button></a>

										 {!!link_to_route('quimestres.show', $title = '', $parameters = $quimestres->id, $attributes = ['class'=>'fa fa-calculator fa-2x'])!!}

											<br><br>			
									</div>
									</td>
								</tr>
								@endforeach
                            </tbody>
                        </table>
                    {!! Form::close() !!}
                    </div>            
                </div>
            </div>
        </div>
    </section>
@endsection

