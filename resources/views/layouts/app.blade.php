<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'www.imshuai.cn') - 陈帅同学博客 </title>
    <meta name="author" content="陈帅同学">
    <meta name="keywords" content="陈帅同学|imshuai.cn|php|mysql|linux|nginx|laravel|数据结构|设计模式">
    <meta name="description" content="陈帅同学|imshuai.cn|php|mysql|linux|nginx|laravel|数据结构|设计模式">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.1/jquery.min.js"></script>
    @yield('styles')
</head>

<body>
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">

            @include('layouts._message')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>

    @if (app()->isLocal())
        @include('sudosu::user-selector')
    @endif
    
    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>