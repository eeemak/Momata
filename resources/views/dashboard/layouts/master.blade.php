<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">
    <title>{{ config('dashboard.title') }} | Dashboard</title>
    {{-- Common Styles --}}
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    {{-- Page Styles --}}
    @yield('style')
</head>

<body>
    <div class="main-wrapper">
        {{-- Header --}}
        @include('dashboard.layouts.header')
        {{-- Sidebar --}}
        @include('dashboard.layouts.sidebar')
        
        <div class="page-wrapper">
            {{-- Content --}}
            @yield('content')

            {{-- Message Box --}}
            @include('dashboard.layouts.message_box')
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    {{-- Common Scripts --}}
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
    {{-- Page Scripts --}}
    @yield('script')
</body>

</html>