<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ empty($title) ? "" : "{$title} |" }} {{ config('app.name') }}</title>
    <meta name="description" content="">
    <meta name="author" content="Nelson Flores">
    <meta name="robots" content="noindex, nofollow">
    <!-- Icons -->
    <link rel="shortcut icon" href="{{ url('assets/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ url('assets/logo.png') }}">
    <link rel="icon" href="{{ url('assets/logo.png') }}">
    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="{{  url('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    @livewireStyles
</head>
<body {!! empty($bg_img) ?'': "style=\"background-image: url('". url($bg_img) . "'); background-position:center; background-size: cover; background-repeat:no-repeat;" !!}>
    <!-- Page Container -->
    <div id="page-container">
        @yield('template')
    </div>
    <!-- End Page Container -->
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    @livewireScripts
    @yield('scripts')
</body>
</html>