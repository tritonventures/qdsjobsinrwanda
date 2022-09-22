<!DOCTYPE html>
<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <title>QDS MANPOWER Rwanda</title>
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrapper" id="app" v-cloak>
        <div class="preloader"></div>
        <div class="ads flex-center" style="height: 65px">
            <marquee behavior="" direction="">
                <p>Ads space</p>
            </marquee>
        </div>
        <b-navbar variant="primary-2" toggleable="lg" sticky type="dark">
            <b-container>
                <b-navbar-brand href="{{ route('index') }}" class="d-flex align-items-center flex-nowrap">
                    <img src="{{ asset('images/logo.png') }}" alt="QDS MANPOWER" class="rounded" style="width: 70px">
                    <span class="font-weight-bold h4 text-light ml-2 mb-0">QDS MANPOWER Rwanda</span>
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
                        <b-nav-item link-classes="text-light" href="{{ route('partners') }}">Our Partners</b-nav-item>
                        {{-- <b-nav-item link-classes="text-light" href="#about">Contact</b-nav-item> --}}
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


        <!-- Main Header Nav -->


        <!-- Home Design -->
        <section class="home-one parallax ulockd_bgih1 d-flex align-items-center w-100"
            data-stellar-background-ratio="0.3">
            <div class="container">
                <div class="row home-content">
                    <div class="col-lg-8">
                        <div class="home-text">
                            <h2 class="fz40">QDS MANPOWER Rwanda<br> Your Human Capital Solution.</h2>
                            <p class="color-silver">Each month, more than 2 million jobseekers across Africa turn to
                                the website in their search for jobs, making over 66,000 applications every day.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- Features Job List Design -->
        <section class="popular-job bgc-fa pb30 pt-4">
            <b-container>
                <b-row>
                    <b-col class="py-2">
                        <b-tabs pills content-class="mt-3">
                            <recent-jobs></recent-jobs>
                            <recent-tenders></recent-tenders>
                            <recent-internships></recent-internships>
                        </b-tabs>
                    </b-col>
                    <b-col class="py-2" cols="12" md="3" lg="4" xl="3">
                        <div class="card h-100 flex-center" style="min-height: 100px">
                            <marquee> ads space</marquee>
                        </div>
                    </b-col>
                    <b-col class="py-2" cols="12">
                        <div class="card flex-center" style="height: 200px">
                            <marquee>Ads space</marquee>
                        </div>
                    </b-col>
                </b-row>

            </b-container>

            <span id="about"></span>
        </section>

        <section class="about-section bgc-fa">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about_content">
                            <h3>ABOUT QDS MANPOWER Rwanda</h3>
                            <p class="color-black22 mt30">QDS MANPOWER Rwanda is a subsidiary project of QUICK DETAILED SERVICES LTD a privately owned corporate company by young innovative youth that intends to end
                                unemployment across Africa. <br>


                            </p>
                            <p>
                                QUICK DETAILED SERVICES LTD specializes in human resource (MANPOWER supply), Cleaning services
                                and other business support activities. QDS MANPOWER RWNADA is Africa’s leader in
                                innovative
                                workforce
                                solutions, connecting human
                                potential to power of business. QDS MANPOWER RWANDA serves both large and small
                                organizations
                                across Africa in all industry of work through our brands offerings.
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about_thumb mt50">
                            <img class="img-fluid" src="images/about/1.png" alt="1.png">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It's Work -->
        <section class="popular-job">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-left">
                        <div class="ulockd-main-title">
                            <h3 class="mt0">VISION & VALUES</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p>
                            Our vision is to lead in the creation and delivery of innovative work force solutions and
                            services that enables our clients to win in the changing world of work.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 d-flex prpl5">
                        <div class="icon_box_hiw py-4 px-3">
                            <div class="details">
                                <h4 class="text-center mb-3">PEOPLE</h4>
                                <ul class="text-left p-0">
                                    <li>We care about people and the role of work in their lives.</li>
                                    <li>We help people develop their careers through planning work, coaching and
                                        trainings</li>
                                    <li>We recognize everyone’s contribution to our success, Our stuff, our clients our
                                        candidates.</li>
                                    <li>We encourage and reward achievements of our employees.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex prpl5">
                        <div class="icon_box_hiw py-4 px-3">
                            <div class="details">
                                <h4 class="text-center mb-3">KNOWLEDGE</h4>
                                <ul class="text-left">
                                    <li>We share our knowledge, our expertise and our resources.</li>
                                    <li>
                                        We actively listen and act upon this information to improve our relationships
                                        solution and services.
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 d-flex prpl5">
                        <div class="icon_box_hiw py-4 px-3 text-left">
                            <div class="details">
                                <h4 class="text-center mb-3">INNOVATION</h4>
                                <ul>
                                    <li>
                                        Based on our understanding of the world of work, we actively pursue the
                                        development and adoption of the best practices worldwide.
                                    </li>
                                    <li>We lead in the world of work.</li>
                                    <li>We dare to innovate, to pioneer and to evolve.</li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="col-12  d-flex prpl5 py-3 bg-white ">
                        <div class="ads w-100 rounded border flex-center" style="height: 150px">
                            <marquee>Ads</marquee>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <!-- Our Footer Top Area -->
        <section class="footer_top_area p0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4 pb25 pt25 flex-center">
                        <div class="icon_box_hiw py-4 px-3 text-left h-100">
                            <div class="details">
                                <h4 class="text-center mb-3">GET IN TOUCH</h4>
                                <ul>
                                    <li class="font-weight-bold list-style-none mb-2">
                                        QDS MANPOWER Rwanda.
                                    </li>
                                    <li class="list-style-none mb-2">
                                        Address: Remera, Kigali, KN 5 Rd
                                    </li>
                                    <li class="list-style-none mb-2">Email: <a class="text-white"
                                            href="mailto:info@qdsMANPOWERrwanda.com">info@qdsMANPOWERrwanda.com</a></li>
                                    <li class="list-style-none">
                                        Phone:
                                        <a class="text-white" href="tel:+250785775280">(+250) 785 775 280</a>
                                        <a class="text-white" href="tel:+250786220315">(+250) 786 220 315</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 pb25 pt25 brdr_left_right">
                        <div class="icon_box_hiw py-4 px-3 text-left h-100">
                            <div class="details">
                                <h4 class="text-center mb-3">OUR SERVICES</h4>
                                <ul>
                                    <li class="font-weight-bold">
                                        Jobs advertisement
                                    </li>
                                    <li class="font-weight-bold">
                                        Short-listing
                                    </li>
                                    <li class="font-weight-bold">
                                        Manpower outsourcing </li>
                                    <li class="font-weight-bold">
                                        Resumes on-demand
                                    </li>
                                    <li class="font-weight-bold">
                                        Payroll management
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4 pb25 pt25 pl30">
                        <div class="footer_social_widget mt15">
                            <p class="mt10 mx-2">Follow Us</p>
                            <ul class="text-left">
                                <a href="https://www.youtube.com/channel/UCmP4UAPzA-T9jPhOG7mt_tA">
                                    <li class="list-inline-item" style="background: red"><i
                                            class="fa fa-youtube text-white"></i></li>
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=100063619868768">
                                    <li class="list-inline-item" style="background: #1877f2"><i
                                            class="text-white fa fa-facebook"></i></li>
                                </a>

                                <a href="https://twitter.com/qdsmanpower" target="_blank">
                                    <li class="list-inline-item" style="background: #1d9bf0"><i
                                            class="text-white fa fa-twitter"></i>
                                    </li>
                                </a>

                                <a href="https://www.instagram.com/qdsmanpower/" target="_blank">
                                    <li class="list-inline-item" style="background: #cd2d89"><i
                                            class="text-white fa fa-instagram"></i></li>
                                </a>
                                <a href="https://www.linkedin.com/groups/9095129" target="_blank">
                                    <li class="list-inline-item" style="background: #0a66c2"><i
                                            class="text-white fa fa-linkedin"></i></li>
                                </a>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <a class="scrollToHome" href="#"><i
                class="flaticon-left-arrow d-flex align-items-center justify-content-center h-100 w-100"></i></a>
    </div>
    <!-- Wrapper End -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="js/ace-responsive-menu.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/snackbar.min.js"></script>
    <script type="text/javascript" src="js/simplebar.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/scrollto.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/progressbar.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/timepicker.js"></script>
    <!-- Custom script for all pages -->
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>