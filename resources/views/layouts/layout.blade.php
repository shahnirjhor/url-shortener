<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>
        {{ $ApplicationSetting->item_short_name }}
        @if (isset($title) && !empty($title))
            {{ " | ".$title }}
        @endif
    </title>
    @include('thirdparty.css_back')
    @yield('one_page_css')
    @include('thirdparty.js_back')
    @yield('one_page_js')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@include('thirdparty.js_back_footer')
@stack('custom-js')
</body>
</html>
