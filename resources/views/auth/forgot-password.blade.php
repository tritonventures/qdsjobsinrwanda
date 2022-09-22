@extends('layouts.guest')


@section('content')
    <section class="our-log-reg">
        <div class="container">
            <div class="align-items-center justify-content-center row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    @include('flash::message')
                    <div class="login_form">
                        <form method="post" action="{{ route('reset.submit') }}">
                            @csrf
                            <div class="heading">
                                <h3 class="text-center">Request Password Reset</h3>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-log btn-block btn-thm">Submit</button>
                            <hr>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>




@endsection
@push('css')
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="js/scrollIt.js"></script>
    <script type="text/javascript" src="js/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/nice-select.min.js"></script>
    <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/jquery.slicknav.min.js"></script>
    <script type="text/javascript" src="js/jquery.animatedheadline.min.js"></script>
    <script type="text/javascript" src="js/date-time.js"></script>
    <script type="text/javascript" src="js/bundle.js"></script>
    <script type="text/javascript" src="js/vivus.min.js"></script>
    <script type="text/javascript" src="js/svg.animation.js"></script>
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

    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="js/script.js"></script>
@endpush
