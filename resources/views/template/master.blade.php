<!DOCTYPE html>
<html
    class="js sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers"
    lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/termosin.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <header>
        @include('template.nav.navbar')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('template.nav.footer')
    </footer>
    <script data-ad-client="ca-pub-6496152081130759" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/js/contact.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
