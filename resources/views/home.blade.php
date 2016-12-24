@extends('layouts.app')

@section('htmlheader_title')
	Bienvenido
@endsection


@section('main-content')
	<div class="container spark-screen">
	@if(Session::has('message-error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message')}}
            </ul>
        </div>
    @endif
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Bienvenido</div>

					<div class="panel-body">
					 	{{Session::get('message')}}
						{{ trans('adminlte_lang::message.logged') }}
					</div>
					
				</div>
			</div>
		</div>
	</div>
@endsection
