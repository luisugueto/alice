@extends('layouts.app')

@section('htmlheader_title')
    Página de error 403
@endsection

@section('contentheader_title')
    Página de error 403
@endsection

@section('$contentheader_description')
@endsection

@section('main-content')

<div class="error-page">
    <h2 class="headline text-yellow"> 403</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow"></i> Oops! {{ trans('adminlte_lang::message.pagenotfound') }}.</h3>
        <p>
            No hemos podido encontrar la página que estás buscando.
        </p>
        
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection