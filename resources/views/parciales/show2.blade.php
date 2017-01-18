@extends('welcome')

@section('contentheader_title', 'Coordinaciones')
@section('contentheader_description', 'Coordinaciones de Cursos')

@section('main-content')

    <div class="block">
        <div class="box">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Cordinaciones</div>
            </div>
            <div class="block-content collapse in">
                <div class="table-responsive">
                    <div class="span12">
                        <table id="example1" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Curso</th>
                                <th>Sección</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cuantos>0)
                                @foreach($docentes2 as $doc)
                                    <tr>
                                        <td> {{$doc->curso}}</td>
                                        <td> {{$doc->literal}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('parciales.show-estudiantes', $doc->id) }}" class="btn btn-primary"><i class="icon-refresh icon-white"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
