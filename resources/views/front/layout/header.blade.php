<!doctype html>
<html class="no-js" dir="rtl" lang="ar">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ strip_tags(settings('site_title'))}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{settings_image('fav')}}">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/bootstrap.rtl.min.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/mb.YTPlayer.min.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/slick.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/default.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/style.css">
        <link rel="stylesheet" href="{{ URL::asset('front')}}/assets/css/responsive.css">

        @yield('style')
    </head>
    <body>

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header -->
        <header id="sticky-header" class="header-area transparent-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="{{url('/')}}" class="navbar-brand">
                                    <img src="{{settings_image('logo')}}" alt="Logo">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}#home">الرئيسية</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}#about">من نحن</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}#features">خصوصیات</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}#screesnshot">شاشات من التطبيق</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('/')}}#contact">تواصل معنا</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('client/login')}}">تسجيل الدخول</a></li>
                                        <li class="nav-item d-lg-none"><a class="nav-link" href="{{url('create-company')}}">سجل منشأتك</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn d-none d-lg-block">
                                    <a href="{{url('create-company')}}" class="btn">سجل منشأتك</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->