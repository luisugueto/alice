@extends('layouts.app')

@section('contentheader_title', 'Bienvenido')
@section('contentheader_description', 'Inicio')

@section('main-content')

<div class="col-xs-12">


    @include('alerts.errors')

    <section class="content">
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
    </section>

</div>

@endsection
