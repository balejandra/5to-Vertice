<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo') | {{ config('app.name') }}</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome-6.4.2/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('assets/bootstrap-5.3.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/@coreui/@coreui.css') }}">
    @routes
</head>

<body class="text-gray-900 antialiased">
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap-5.3.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/fontawesome-6.4.2/js/all.js') }}"></script>
    <script src="{{ asset('assets/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/@coreui/utils/js/coreui-utils.js') }}"></script>
    @stack('scripts')
</body>

</html>
