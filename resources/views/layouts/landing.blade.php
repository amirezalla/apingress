@php
    use App\Models\Utility;

    $settings = Utility::settings();
    $logo=\App\Models\Utility::get_file('uploads/logo');

    $company_logo=Utility::getValByName('company_logo_dark');
    $company_logos=Utility::getValByName('company_logo_light');

    $setting = \App\Models\Utility::colorset();
    $color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
    $mode_setting = \App\Models\Utility::mode_layout();
    $SITE_RTL = Utility::getValByName('SITE_RTL');

    $getseo= App\Models\Utility::getSeoSetting();
    $metatitle =  isset($getseo['meta_title']) ? $getseo['meta_title'] :'';
    $metsdesc= isset($getseo['meta_desc'])?$getseo['meta_desc']:'';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image'])?$getseo['meta_image']:'';
    $get_cookie = Utility::getCookieSetting();


@endphp
<!DOCTYPE html>
<html lang="en" dir="{{$setting['SITE_RTL'] == 'on'?'rtl':''}}">
<head>

    <title>{{__('ERPGo SaaS')}}</title>
    <meta name="title" content="{{$metatitle}}">
    <meta name="description" content="{{$metsdesc}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:title" content="{{$metatitle}}">
    <meta property="og:description" content="{{$metsdesc}}">
    <meta property="og:image" content="{{$meta_image.$meta_logo}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ env('APP_URL') }}">
    <meta property="twitter:title" content="{{$metatitle}}">
    <meta property="twitter:description" content="{{$metsdesc}}">
    <meta property="twitter:image" content="{{$meta_image.$meta_logo}}">


    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Dashboard Template Description" />
    <meta name="keywords" content="Dashboard Template" />
    <meta name="author" content="Rajodiya Infotech" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon" />

    <link rel="stylesheet" href="{{asset('assets/css/plugins/animate.min.css')}}" />
    <!-- font css -->
    <link rel="stylesheet" href="{{asset('assets/fonts/tabler-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/feather.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/material.css')}}">

    <!-- vendor css -->
    @if ($SITE_RTL == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-rtl.css') }}">
    @endif
    @if ($setting['cust_darklayout'] == 'on')
        <link rel="stylesheet" href="{{ asset('assets/css/style-dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link">
    @endif
    <link rel="stylesheet" href="{{asset('assets/css/customizer.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/landing.css')}}" />
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
        }

        h1, h2, h3 {
            margin-bottom: 10px;
        }

        .portfolio-item {
            margin-bottom: 20px;
        }

        .portfolio-item img {
            width: 100%;
            max-width: 300px;
            height: auto;
        }
        .roadmap {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .roadmap-item {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .roadmap-item:last-child {
            margin-bottom: 0;
        }

        .roadmap-date {
            font-size: 18px;
            font-weight: bold;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .roadmap-content {
            border-left: 2px solid #333;
            padding-left: 20px;
        }

        .roadmap-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .roadmap-description {
            font-size: 16px;
            color: #666;
        }
    </style>
</head>

<body class="{{$color}}">
<!-- [ Nav ] start -->
<nav class="navbar navbar-expand-md navbar-dark default top-nav-collapse">
    <div class="container">
        <a class="navbar-brand bg-transparent" href="">

{{--                <img src="{{ $logo .'/logo-light.png' }}" alt="logo" width="40%"/>--}}
                <img src="{{ asset('assets/images/fintechcoin.png') }}" alt="logo" width="40%"/>


        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav align-items-center ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>


                <li class="nav-item">

                    <a class="nav-link"  href="#team">Our Team</a>

                </li>
                <li class="nav-item">

                    <a class="nav-link" href="#roadmap">Roadmap</a>
                </li>

                <li class="nav-item">
                    <a class="btn btn-light ms-2 me-1" href="{{ route('login') }}">{{__('Login')}}</a>
                </li>
                @if($settings['enable_signup'] == 'on')
                    <li class="nav-item">
                        <a class="btn btn-light ms-2 me-1" href="{{ route('register') }}">Register</a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</nav>
<!-- [ Nav ] start -->
<!-- [ Header ] start -->
<header id="home" class="bg-primary">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-5">
                <h1
                    class="text-white mb-sm-4 wow animate__fadeInLeft"
                    data-wow-delay="0.2s"
                >
                    We're Building Software For You

                </h1>
                <h2
                    class="text-white mb-sm-4 wow animate__fadeInLeft"
                    data-wow-delay="0.4s"
                >
                    {{__('All In One Business ERP With Project, Account, HRM, CRM')}}
                </h2>
                <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                    Use these awesome forms to login or create new account in your
                    project for free.
                </p>
                <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">

                </div>
            </div>
            <div class="col-sm-5">
                <img
                    src="{{asset('assets/images/front/header-mokeup.svg')}}"
                    alt="Datta Able Admin Template"
                    class="img-fluid header-img wow animate__fadeInRight"
                    data-wow-delay="0.2s"
                />
            </div>
        </div>
    </div>
</header>


<section id="features" class="feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-9 title">
                <h2>
                    <span class="d-block mb-3">Features</span> All in one place CRM
                    system
                </h2>
                <p class="m-0">

                    Use these awesome forms to login or create new account in your
                    project for free.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <div class="theme-avtar bg-danger">

                            <i class="fa  fa-desktop"></i>
                        </div>
                        <h6 class="text-muted mt-4">Feature</h6>
                        <h4 class="my-3 f-w-600"> Custom Software Development:</h4>
                        <p class="mb-0">

                            Software houses specialize in creating tailor-made software solutions to meet the unique needs of their clients. They develop software applications, websites, mobile apps, and other digital products from scratch, ensuring that they align with the client's requirements.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.4s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <div class="theme-avtar bg-success">
{{--                            <i class="ti ti-user-plus"></i>--}}
                            <i class="fa fa-globe"></i>
                        </div>
                        <h6 class="text-muted mt-4">Feature</h6>
                        <h4 class="my-3 f-w-600">Web Development:</h4>
                        <p class="mb-0">
                             Software houses offer expertise in building responsive and interactive websites using a variety of technologies such as HTML, CSS, JavaScript, and frameworks like React, Angular, or Vue.js. They can develop static websites, dynamic web applications, and e-commerce platforms.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.6s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <div class="theme-avtar bg-warning">
                            <i class="fa fa-mobile"></i>
                        </div>
                        <h6 class="text-muted mt-4">Feature</h6>
                        <h4 class="my-3 f-w-600">Mobile App Development:</h4>
                        <p class="mb-0">
                             With the increasing popularity of mobile devices, software houses often offer mobile app development services for both iOS and Android platforms. They can develop native apps, hybrid apps, or progressive web apps (PWAs), depending on the client's needs and target audience.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <div class="theme-avtar bg-danger">

                            <i class="fa fa-palette"></i>
                        </div>
                        <h6 class="text-muted mt-4">Feature</h6>
                        <h4 class="my-3 f-w-600">UI/UX Design:</h4>
                        <p class="mb-0">
                             Software houses usually have skilled designers who can create visually appealing and user-friendly interfaces for software applications and websites. They focus on providing a seamless user experience (UX) through intuitive layouts, effective navigation, and aesthetically pleasing designs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-sm-5 feature-mobile-screen">

            <a class="btn px-sm-5 btn-primary me-sm-3 " href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>
            <a class="btn px-sm-5 btn-outline-primary" href="{{ route('register') }}">Register Now</a>

        </div>
    </div>
</section>

<section class="">
    <div class="container">
        <div class="row align-items-center justify-content-end mb-5">
            <div class="col-sm-4">
                <h1
                    class="mb-sm-4 f-w-600 wow animate__fadeInLeft"
                    data-wow-delay="0.2s"
                >
                    MobileApplication
                </h1>
                <h2 class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.4s">
                    {{__('All In One Business ERP With Project, Account, HRM, CRM')}}
                </h2>
                <p class="mb-sm-4 wow animate__fadeInLeft" data-wow-delay="0.6s">
                    Use these awesome forms to login or create new account in your
                    project for free.
                </p>
                <div class="my-4 wow animate__fadeInLeft" data-wow-delay="0.8s">

                    <a class="btn btn-primary" href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>


                </div>
            </div>
            <div class="col-sm-6">
                <img
                    src="{{asset('landing/images/dash-2.svg')}}"
                    alt="Datta Able Admin Template"
                    class="img-fluid header-img wow animate__fadeInRight"
                    data-wow-delay="0.2s"
                />
            </div>
        </div>
        <div class="row align-items-center justify-content-start">
            <div class="col-sm-6">
                <img
                    src="{{asset('assets/images/front/img-crm-dash-4.svg')}}"
                    alt="Datta Able Admin Template"
                    class="img-fluid header-img wow animate__fadeInLeft"
                    data-wow-delay="0.2s"
                />
            </div>
            <div class="col-sm-4">
                <h1
                    class="mb-sm-4 f-w-600 wow animate__fadeInRight"
                    data-wow-delay="0.2s"
                >
                    WebApplication
                </h1>
                <h2 class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.4s">
                    {{__('All In One Business ERP With Project, Account, HRM, CRM')}}
                </h2>
                <p class="mb-sm-4 wow animate__fadeInRight" data-wow-delay="0.6s">
                    Use these awesome forms to login or create new account in your
                    project for free.
                </p>
                <div class="my-4 wow animate__fadeInRight" data-wow-delay="0.8s">
                    <a class="btn btn-primary" href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="roadmap" class="price-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-9 title">
                <h2>
                    <span class="d-block mb-3">RoadMap</span> All in one place CRM
                    system
                </h2>
                <p class="m-0">
                    Use these awesome forms to login or create new account in your
                    project for free.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div
                    class="card price-card price-1 wow animate__fadeInUp"
                    data-wow-delay="0.2s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <span class="price-badge bg-primary">Phase 1: Planning</span>
                        <span class="mb-4 f-w-600 p-price"
                        >Planning</span
                        >
                        <p class="mb-0">

                            Define project requirements and <br />
                            create a detailed plan.
                        </p>
                        <ul class="list-unstyled my-5">
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Gather client requirements
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Create project timeline
                            </li>

                        </ul>
                        <div class="d-grid text-center">


                                <a class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5" href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="card price-card price-2 bg-primary wow animate__fadeInUp"
                    data-wow-delay="0.4s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <span class="price-badge">Phase 2: Development</span>
                        <span class="mb-4 f-w-600 p-price"
                        >Develop</span
                        >
                        <p class="mb-0">

                            Build and implement <br />
                            the software solution.
                        </p>
                        <ul class="list-unstyled my-5">
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Develop core features
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Perform testing and bug fixing
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Integrate additional functionalities
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Sketch Files
                            </li>
                        </ul>
                        <div class="d-grid text-center">

                            <a class="btn mb-3 btn-light d-flex justify-content-center align-items-center mx-sm-5" href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div
                    class="card price-card price-3 wow animate__fadeInUp"
                    data-wow-delay="0.6s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <div class="card-body">
                        <span class="price-badge bg-primary">Phase 3: Deployment</span>
                        <span class="mb-4 f-w-600 p-price"
                        >Deploy</span
                        >
                        <p class="mb-0">

                            Launch and deliver <br />
                            the software solution.
                        </p>
                        <ul class="list-unstyled my-5">
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Prepare for deployment
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Deploy the software to production
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Conduct Performance Testing
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Data Migration
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Deployment to Production
                            </li>
                            <li>
                    <span class="theme-avtar">
                      <i class="text-primary ti ti-circle-plus"></i
                      ></span>
                                Post-Deployment Monitoring and Support
                            </li>
                        </ul>
                        <div class="d-grid text-center">

                            <a class="btn mb-3 btn-primary d-flex justify-content-center align-items-center mx-sm-5" href="{{ route('login') }}">Start with Us  <i class="ti ti-chevron-right ms-2"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="team" class="team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-9 title">
                <h2>
                    <span class="d-block mb-3">our team</span>
                </h2>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
{{--                    <img src="{{asset('assets/images/image.png')}}">--}}
{{--                    <img src="team_member1.jpg" class="card-img-top" alt="Team Member 1">--}}
                    <img src='{{ asset('assets/images/siavash.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Siavash Akbarzadeh</h6>
                        <h4 class="my-3 f-w-600">Developer</h4>
                        <p class="mb-0">
                            Skills: HTML, CSS, JavaScript, Python
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.4s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <img src='{{ asset('assets/images/aida.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Aida Allahverdi</h6>
                        <h4 class="my-3 f-w-600">ProjectManager</h4>
                        <p class="mb-0">
                            Skills: HTML, CSS, JavaScript, Python
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.6s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <img src='{{ asset('assets/images/amir.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Amirreza Allahverdi</h6>
                        <h4 class="my-3 f-w-600">Developer</h4>
                        <p class="mb-0">
                            Skills: HTML, CSS, JavaScript, Python,Blockchain, Solidity, Redhat, Javascript
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <img src='{{ asset('assets/images/fabrizio.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Fabrizio Marino</h6>
                        <h5 class="my-3 f-w-600">BUSINESS DEVELOPEMENT EXECUTIVE</h5>
                        <p class="mb-0">
                            Sales and external relations
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <img src='{{ asset('assets/images/daniela.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Daniela Andrei</h6>
                        <h5 class="my-3 f-w-600">Business development Manager</h5>
                        <p class="mb-0">
                            business and organizational management
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div
                    class="card wow animate__fadeInUp"
                    data-wow-delay="0.8s"
                    style="
                visibility: visible;
                animation-delay: 0.2s;
                animation-name: fadeInUp;
              "
                >
                    <img src='{{ asset('assets/images/marco.png') }}'>
                    <div class="card-body">

                        <h6 class="text-muted mt-4">Marco Aquapendente</h6>
                        <h4 class="my-3 f-w-600">Crypto Consultant</h4>
                        <p class="mb-0">
                            Consultanting of crypto and finance
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-sm-5 feature-mobile-screen">
            <a class="btn px-sm-5 btn-primary me-sm-3 " href="{{ route('login') }}">Login Now</a>

        </div>
    </div>
</section>


<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <img src="{{ asset('assets/images/fintechcoin.png') }}" alt="logo" width="40%"/>
{{--                @if($settings['cust_darklayout'] && $settings['cust_darklayout'] == 'on' )--}}

{{--                    <img src="{{ $logo . '/' . (isset($company_logos) && !empty($company_logos) ? $company_logos : 'logo-dark.png') }}"--}}
{{--                         alt="logo" style="width: 150px;" >--}}
{{--                @else--}}

{{--                    <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"--}}
{{--                         alt="logo" style="width: 150px;" >--}}
{{--                @endif--}}
            </div>
            <div class="col-lg-6 col-sm-12 text-end">

                <p class="text-body">Copyright © 2023 | Design By FintechCoin</p>
            </div>
        </div>
    </div>
</section>
<!-- [ dashboard ] End -->
<!-- Required Js -->
<script src="{{asset('assets/js/plugins/popper.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/pages/wow.min.js')}}"></script>
<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function () {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]
    var wow = new WOW({
        animateClass: "animate__animated", // animation css class (default is animated)
    });
    wow.init();
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
    });
</script>
@if($get_cookie['enable_cookie'] == 'on')
    @include('layouts.cookie_consent')
@endif
</body>

</html>
