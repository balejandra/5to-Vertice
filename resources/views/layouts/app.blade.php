<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo') | {{ config('app.name') }}</title>
    <!-- CSS -->
    <link href="{{ asset('assets/bootstrap-5.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/@coreui/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-6.4.2/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/@coreui/@coreui.css') }}">

    @routes
</head>

<body class="font-sans antialiased">
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        @include('partials.sidebar')
    </div>
    <div class="wrapper d-flex flex-column min-vh-100">
        <header class="header header-sticky mb-4">
            @include('partials/header')
            <div class="container-fluid  border-secondary-subtle border-top">
                {{ Breadcrumbs::render() }}
            </div>
        </header>
        <div class="body flex-grow-1 px-2">
            <div class="container-lg">

                @yield('content')

            </div>
        </div>
    </div>

    <footer class="footer">
        @include('partials/footer')
    </footer>

</body>
<!-- Scripts -->
<script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/bootstrap-5.3.1/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/jquery/moment.min.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/fontawesome-6.4.2/js/all.js') }}"></script>
<script src="{{ asset('assets/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('assets/@coreui/utils/js/coreui-utils.js') }}"></script>
<script src="{{ asset('assets/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/bootbox-6.0.0/bootbox.js') }}"></script>
<script src="{{ asset('js/tables.js') }}"></script>
<script src="{{asset('js/all-app.js')}}"></script>

@stack('scripts')

</html>
