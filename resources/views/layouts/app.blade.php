<!DOCTYPE html>
<html>

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
    <title>QDS Manpower Rwanda</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#" style="height: 39px">
            <img class="navbar-brand-full res-logo" src="{{ asset('images/logo.png') }}" style="height: 50px"
                alt="Reslute logo">
            <img class="navbar-brand-minimized" src="{{ asset('images/logo.jpeg') }}" width="30" height="30"
                alt="Reslute logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="btn btn-primary btn-flat"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock mr-2"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </header>

    <div class="app-body" id="app">
        @include('layouts.sidebar')
        <main class="main">
            @yield('content')
        </main>
    </div>
    <footer class="app-footer">
        <div class="ml-auto">
            <span>&copy; {{ date('Y') }} QDS Manpower RWANDA.</span>
        </div>
    </footer>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">

</script>
<script src="{{ mix('js/app.js') }}">
</script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
@stack('scripts')

</html>
