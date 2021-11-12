<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="{{ asset('css/lib/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/shortcodes.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/lib/responsive.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' id='layerslider-css' href="{{ asset('css/lib/layerslider.css') }}" type='text/css'
        media='all' />

    <link href="{{ asset('css/lib/prettyPhoto.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--[if IE 7]>
<link href="{{ asset('css/lib/font-awesome-ie7.css') }}" rel="stylesheet" type="text/css">
<![endif]-->
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel='stylesheet'
        type='text/css'>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel='stylesheet' type='text/css'>

    <script src="{{ asset('js/lib/modernizr-2.6.2.min.js') }}"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="main">

    <div class="wrapper">
        @include('layouts.admin.partials.header')
        @yield('content')
    </div>

    <script type="text/javascript" src="{{ asset('js/lib/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery-migrate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery-easing-1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.inview.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/validation.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.tipTip.minified.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/twitter/jquery.tweet.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/shortcodes.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/jquery-transit-modified.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/lib/layerslider.kreaturamedia.jquery.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/lib/greensock.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/lib/layerslider.transitions.js') }}"></script>


    @yield('javascript')


</body>

</html>
