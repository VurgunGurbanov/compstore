

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>cla</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- fevicon -->
    <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">

    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout{{request()->routeIs('index') ? '' : ' inner_posituong computer_page'}}">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="{{route('index')}}"><img src="{{asset('images/logo.png')}}" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item{{request()->routeIs('index') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('index')}}">Home</a>
                                </li>
                                <li class="nav-item{{request()->routeIs('about') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('about')}}">About</a>
                                </li>
                                <li class="nav-item{{request()->routeIs('computer') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('computer')}}">Computer</a>
                                </li>
                                <li class="nav-item{{request()->routeIs('laptop') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('laptop')}}">Laptop</a>
                                </li>
                                <li class="nav-item{{request()->routeIs('product') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('product')}}">Products</a>
                                </li>
                                <li class="nav-item{{request()->routeIs('contact') ? ' active' : ''}}">
                                    <a class="nav-link" href="{{route('contact')}}">Contact Us</a>
                                </li>
                                <li class="nav-item d_none">
                                    <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </li>
                                <li class="nav-item d_none">
                                    <a class="nav-link" href="#">Login</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')


@include('includes.footer')
<!-- end footer -->
<!-- Javascript files-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>


