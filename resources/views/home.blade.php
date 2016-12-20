@extends('layouts.app')

@section('htmlheader_title')
	Bienvenido
@endsection


@section('main-content')
	<div class="container spark-screen">
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
