@extends('welcome')

@section('contentheader_title', 'IESS')
@section('contentheader_description', 'Inicio')



@section('main-content')     

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">IESS</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <td>Nombre</td>
                                    <td>Valor</td>
                                    <td>Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($iess as $i)
                                    <tr>
                                        <td>{{ $i->nombre }}</td>
                                        <td>{{ $i->valor }}</td>    
                                        <td style="text-align: center; width: 100px;"><a href="{{ route('iess.edit', $i->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a></td>                             
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection