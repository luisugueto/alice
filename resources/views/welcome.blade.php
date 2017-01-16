<!DOCTYPE html>
<html class="no-js">

<head>
    @include('layouts.partials.htmlheader')
</head>

<body>

    <div class="navbar navbar-fixed-top">
        @include('layouts.partials.mainheader')
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="row-fluid">

                @include('alerts.request')
                @include('alerts.errors')

                <div class="navbar">
                    @include('layouts.partials.contentheader')
                </div>
            </div>

            @yield('main-content')

        </div>
        <hr>
        @include('layouts.partials.footer')
    </div>

    @include('layouts.partials.scripts')

</body>

</html>

