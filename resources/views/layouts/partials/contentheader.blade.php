<section class="content-header">
    <h1>
        @yield('contentheader_title')
        <small>@yield('contentheader_description')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @yield('contentheader_title')</a></li>
        <li class="active">@yield('contentheader_description')</li>
    </ol>
</section>