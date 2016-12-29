@extends('layouts.app')

@section('contentheader_title', 'Bienvenido')
@section('contentheader_description', 'Inicio')

@section('main-content')

    <div class="row">
        <div class="col-xs-12">

            <div class="col-xs-12">
                @include('alerts.request')
                @include('alerts.errors')
            </div>

            <div class="col-md-12">
                <div class="box-body">
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
    </div>

@endsection