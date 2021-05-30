<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ isset($page_title) ? $page_title : '' }} SOS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="language" content="en">
        <meta name="robots" content="index,follow,all" />
        <meta name="Author" content="Thilsan" />
        <meta name="HandheldFriendly" content="True">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="/asset/img/favicon.ico">
        @include('Inc.header')
    </head>
    <body class="animsition">
        @include('Inc.navbar')
        @include('Inc.sidebar')
        @yield('content')        
        @include('Inc.footer')
    </body>
</html>