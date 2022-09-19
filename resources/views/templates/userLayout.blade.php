<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <!-- Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7326678056847065"
     crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="hQarpD7Sl51t8JbSbwvKvmoRu8V6NfjqbnLaKJxVcfE" />
  	<meta name="description" content="Website For Creator Digital, Everyone can Write and be Creative" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0YGJV7E68M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0YGJV7E68M');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156642344-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-156642344-1');
    </script>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('storage')}}/img/web-arahin/preload/icon.svg">

    <link rel="stylesheet" href="{{asset('template')}}/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{asset('template')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('template')}}/css/style.css?version={{ filemtime(public_path('template/css/style.css')) }}">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- For Facebook Comment Plugin-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v12.0" nonce="ZUkqKgcc"></script>

    @include('templates.userHeader')

    @yield('content')

    @include('templates.userFooter')
    
    @stack('scripts')
</body>

</html>
