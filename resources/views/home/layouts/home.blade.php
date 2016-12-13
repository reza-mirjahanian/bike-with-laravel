<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>@yield('title')</title>
    <!-- Favicon-->
    {{--<link rel="shortcut icon" href="images/icon/favicon.ico" type="image/x-icon">--}}
    <link rel="shortcut icon" href="{{ asset('images/icon/favicon.ico') }}" type="image/x-icon">


    <!-- Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/superfish-menu/css/superfish.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/color2/spectrum.css') }}">


    <!-- Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')

    -->
</head>
<body>
<div class="mv-site">
    <header class="header mv-header-style-1 mv-wrap">
        <div class="header-top">
            <div class="container">
                <div class="header-top-inner">
                    <div class="mv-col-wrapper">
                        <div class="mv-col-left header-contact">
                            Reza Mirjahanian
                        </div>
                        <!-- .header-contact-->

                        <div class="mv-col-right align-bottom header-account">
                            <div class="mv-btn-group text-right">
                                <div class="group-inner">

                                    <div class="item-button mv-btn"><a href="{{route('bikes.create')}}" class="item-button mv-btn mv-btn-style-12" target="_blank"> <i class="btn-icon fa fa-shopping-cart hidden-md hidden-lg"></i><span class="btn-text hidden-xs hidden-sm">Admin</span></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- .header-account-->
                    </div>
                </div>
            </div>
        </div>
        <!-- .header-top-->

        <div class="header-main-nav mv-fixed-enabled">
            <div class="container">
                <div class="container-inner">

                    <!-- .header-toggle-off-canvas-->

                    <div class="header-logo"><a href="{{route('home')}}" title="Motor "><img src="{{asset('images/logo/logo_2.png')}}" alt="logo" class="logo-img img-default image-live-view"/><img src="{{asset('images/logo/logo_2.png')}}" alt="logo" class="logo-img img-scroll image-live-view"/></a></div>
                    <!-- .header-logo-->

                    <div class="main-nav-wrapper hidden-xs hidden-sm">
                        <nav class="main-nav">
                            <ul class="nav sf-menu">
                                <li class=""><a href="{{route('home')}}"><span class="menu-text">Home</span></a></li>

                            </ul>
                        </nav>
                    </div>
                    <!-- .header-main-nav-->


                </div>
            </div>
        </div>
        <!-- .header-main-nav-->
    </header>
    <!-- .header-->

    <section class="main-banner mv-wrap">
        <div data-image-src="{{asset('images/background/demo_bg_19.jpg')}}" class="mv-banner-style-1 mv-bg-overlay-dark overlay-0-85 mv-parallax">
            <div class="page-name mv-caption-style-6">
                <div class="container">
                    <div class="mv-title-style-9"><span class="main">@yield('title')</span><img src="{{asset('images/icon/icon_line_polygon_line.png')}}" alt="icon" class="line"/></div>
                </div>
            </div>
        </div>
    </section>



    <section class="mv-main-body product-list-main mv-bg-gray mv-wrap">
        @yield('pageContent')
    </section>
    <!-- .mv-main-body-->


    <!-- .mv-newsletter-style-1-->

    <footer class="footer mv-footer-style-2 mv-wrap">
        <div style="background-image: url({{asset('images/background/demo_bg_2.jpg')}})" class="footer-bg">
            <div class="container">
                <div class="footer-inner"></div>
            </div>
        </div>

        <button type="button" class="mv-btn mv-btn-style-17 mv-back-to-top fixed-right-bottom"><i class="btn-icon fa fa-long-arrow-up"></i></button>
    </footer>
    <!-- .footer-->



</div>
<!-- .mv-site-->


<!-- .popup-wrapper-->

<script type="text/javascript" src="{{ asset('libs/jquery/jquery-2.1.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/smoothscroll/SmoothScroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/superfish-menu/js/superfish.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/jquery-ui/external/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/parallax/parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/jquery-appear/jquery.appear.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('libs/isotope/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/isotope/fit-columns.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('libs/color2/spectrum.js') }}"></script>


<!-- Theme Script-->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>

</html>