@extends('layouts.app')

@section('contentheader_title', 'Bienvenido')
@section('contentheader_description', 'Inicio')

@section('main-content')
<div class="col-md-12">
   
    
    @include('alerts.errors')
    
    <section class="content">
     @if(Session::has('message-error'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                {{Session::get('message-error')}}
            </ul>
        </div>
    @endif
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
