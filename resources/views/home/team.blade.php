@extends('layouts.guest')
@push('css')
    <style>
        .partner img {
            max-width: 300px;
            max-height: 300px;
            min-width: 300px;
            min-height: 300px;
            object-fit: contain;
        }

    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
@endpush


<!-- Our Service Area -->
@section('content')

    <section class="feature-job home4 pb30 border-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ulockd-main-title">
                        <h3 class="mt0">Our Team</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="feature_job_post">
                        <div class="details p-0">
                            <div class="thumb mb-2">
                                <img class="img-fluid"
                                    src="https://w7.pngwing.com/pngs/613/636/png-transparent-computer-icons-user-profile-male-avatar-avatar-heroes-logo-black-thumbnail.png">
                            </div>
                            <h4 class="px-2">Team Member</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="feature_job_post">
                        <div class="details p-0">
                            <div class="thumb mb-2">
                                <img class="img-fluid"
                                    src="https://w7.pngwing.com/pngs/613/636/png-transparent-computer-icons-user-profile-male-avatar-avatar-heroes-logo-black-thumbnail.png">
                            </div>
                            <h4 class="px-2">Team Member</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="feature_job_post">
                        <div class="details p-0">
                            <div class="thumb mb-2">
                                <img class="img-fluid"
                                    src="https://w7.pngwing.com/pngs/613/636/png-transparent-computer-icons-user-profile-male-avatar-avatar-heroes-logo-black-thumbnail.png">
                            </div>
                            <h4 class="px-2">Team Member</h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="feature_job_post">
                        <div class="details p-0">
                            <div class="thumb mb-2">
                                <img class="img-fluid"
                                    src="https://w7.pngwing.com/pngs/613/636/png-transparent-computer-icons-user-profile-male-avatar-avatar-heroes-logo-black-thumbnail.png">
                            </div>
                            <h4 class="px-2">Team Member</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('scripts')

    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.animatedheadline.min.js"></script>
    <script src="js/date-time.js"></script>
    <script src="js/bundle.js"></script>
    <script src="js/vivus.min.js"></script>
    <script src="js/svg.animation.js"></script>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="js/ace-responsive-menu.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/snackbar.min.js"></script>
    <script type="text/javascript" src="js/simplebar.js"></script>
    <script type="text/javascript" src="js/parallax.js"></script>
    <script type="text/javascript" src="js/scrollto.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.js"></script>
    <script type="text/javascript" src="js/progressbar.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script type="text/javascript" src="js/timepicker.js"></script>

    <script src="js/main.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="js/script.js"></script>

@endpush
