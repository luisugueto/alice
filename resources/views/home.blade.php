@extends('layouts.app')

@section('htmlheader_title')
	Home
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Home</div>

					<div class="panel-body">
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
{{ Session::get('periodo').'hola' }}
>>>>>>> f23e81b3771bcd7a07a68d9f995886b3a6a8cd25
					
>>>>>>> 3d5bd799d7ba52b7af8b006358a40957c804623a
						{{ trans('adminlte_lang::message.logged') }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
