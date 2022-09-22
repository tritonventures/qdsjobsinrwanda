<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Your Human Capital Solution." />
    <meta name="keywords"
      content="qds,QDS,manpower,human,resource,rwanda,payments,money,online,qdsmanpower,candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume" />
    <meta name="abstract" content="Your Human Capital Solution." />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://qdsmanpowerrwanda.com/" />
    <meta property="og:title" content="QDS Manpower Rwanda" />
    <meta property="og:description" content="Your Human Capital Solution." />
    <meta property="og:image" content="<%= BASE_URL %>apple-touch-icon.png" />
    <meta name="CreativeLayers" content="ATFN">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Title -->
    <title>QDS Manpower Rwanda</title>
    <!-- Favicon -->
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="msapplication-TileColor" content="#d75733">
    <meta name="msapplication-config" content="images/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">


    <title>{{ config('app.name', 'QDS Manpower RWANDA') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Livvic:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Custom Style -->

    @stack('css')

    <link href="{{ asset('/') }}css/owl.carousel.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: 'Livvic', sans-serif;
            font-size: 15px;
            font-weight: 400;
            color: #454545;
            background-color: #f1f7ff;
        }

        .img {
            max-width: 100%;
            -webkit-transition: .3s;
            -o-transition: .3s;
            transition: .3s
        }

        li {
            list-style: none;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Livvic', sans-serif;
            color: #222;
            font-weight: 600;
            line-height: 1.3;
        }

        a,
        a:hover,
        a:focus,
        a:active {
            font-weight: 500;
            text-decoration: none;
            font-family: 'Livvic', sans-serif;
        }

        ul {
            margin: 0px;
            padding: 0px
        }

        li {
            list-style: none
        }

        p {
            font-size: 15px;
            color: #454545;
            font-family: 'Livvic', sans-serif;
            font-weight: 400;
            line-height: 1.5;
        }

        label {
            font-size: 16px;
            font-weight: 500;
            color: #22105f;
        }

        img {
            max-width: 100%;
            height: auto;
            -webkit-transition-delay: .1s;
            -o-transition-delay: .1s;
            transition-delay: .1s;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
            -webkit-transition-duration: .7s;
            -o-transition-duration: .7s;
            transition-duration: .7s;
            -webkit-transition-property: all;
            -o-transition-property: all;
            transition-property: all;
        }

        img {
            width: 100%;
        }
    </style>

</head>

<body>
    <div id="app" v-cloak>
        <b-navbar variant="primary-2" toggleable="lg" sticky type="dark">
            <b-container>
                <b-navbar-brand href="{{ route('index') }}" class="d-flex align-items-center flex-nowrap">
                    <img src="{{ asset('images/logo.png') }}" alt="QDS Manpower" class="rounded" style="width: 70px">
                    <span class="font-weight-bold h4 text-light ml-2 mb-0">QDS Manpower
                        RWANDA</span>
                </b-navbar-brand>

                <b-navbar-toggle target="navbar-toggle-collapse" class="border">
                    <template #default="{ expanded }">
                        <b-icon variant="light" v-if="expanded" icon="chevron-bar-up"></b-icon>
                        <b-icon variant="light" v-else icon="chevron-bar-down"></b-icon>
                    </template>
                </b-navbar-toggle>

                <b-collapse id="navbar-toggle-collapse" is-nav>
                    <b-navbar-nav class="ml-auto align-items-center mt-4 align-items-lg-stretch mt-lg-0">
                        <b-nav-item link-classes="text-light" href="{{ route('index') }}">Home</b-nav-item>
                        <b-nav-item link-classes="text-light" href="#about">About Us</b-nav-item>
                        <b-nav-item link-classes="text-light" href="{{ route('partners') }}">Our Partners
                        </b-nav-item>
                        <b-nav-item link-classes="text-light" href="#">Contact</b-nav-item>
                        @guest
                        <b-nav-item link-classes="text-light" href="{{ route('login') }}">Sign in</b-nav-item>
                        <b-nav-item link-classes="text-light" href="{{ route('register') }}">Create Profile
                        </b-nav-item>
                        @else
                        <b-nav-item link-classes="text-light" href="{{ route('admin.dashboard') }}">Dashboard
                        </b-nav-item>
                        @endguest
                    </b-navbar-nav>
                </b-collapse>
            </b-container>
        </b-navbar>

        <main>
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('/') }}js/jquery.min.js"></script>
<script src="{{ asset('/') }}js/popper.min.js"></script>
<script src="{{ asset('/') }}js/bootstrap.min.js"></script>
<script src="{{ asset('/') }}js/owl.carousel.js"></script>
@stack('scripts')

</html>