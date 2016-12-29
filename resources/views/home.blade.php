@extends('layouts.app')

@section('contentheader_title', 'Bienvenido')
@section('contentheader_description', 'Inicio')

@section('main-content')

<div class="col-md-12">
   
    @include('alerts.errors')
    
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-default">
						<div class="panel-heading">Bienvenido</div>
						<div class="panel-body">
							{{Session::get('message')}}
							{{ trans('adminlte_lang::message.logged') }}
						</div>
					</div>
                        

@endsection