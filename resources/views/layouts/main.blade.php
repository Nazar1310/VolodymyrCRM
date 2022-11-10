<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRM</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>
<body class="sb-nav-fixed">
@include('layouts.navbar')
<div id="layoutSidenav">
    @include('layouts.sidenav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mb-3">
                @include('layouts.flash-massage')
                @yield('content')
            </div>
        </main>
    </div>
</div>
<script src="{{asset('js/font-awesome.5.11.2.min.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
@if(View::hasSection('javascript'))
    @yield('javascript')
@endif
</body>
</html>
