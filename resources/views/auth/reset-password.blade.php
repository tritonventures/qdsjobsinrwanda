@extends('layouts.guest')


@section('content')
    <section class="our-log-reg">
        <div class="container">
            <div class="align-items-center justify-content-center row">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    @include('flash::message')
                    <div class="login_form">
                        <form method="post" action="{{ url('/password/reset') }}">
                            @csrf
                            <div class="heading">
                                <h3 class="text-center">Reset Password</h3>
                            </div>
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password"
                                        class="form-control mb-0 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        placeholder="Password" name="password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group mb-3" id="show_hide_password">
                                    <input type="password"
                                        class="form-control mb-0 {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                        placeholder="Confirm Password" name="password_confirmation">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-log btn-block btn-thm">Reset</button>
                            <hr>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>



@endsection
@push('css')
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/menu.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/responsive.css">
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ url('/') }}/js/vendor/modernizr-3.5.0.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/vendor/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/popper.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.nav.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.easing.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/waypoints.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/imagesloaded.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/scrollIt.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.scrollUp.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/wow.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/nice-select.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/slick.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.slicknav.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.animatedheadline.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/date-time.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bundle.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/vivus.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/svg.animation.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.mmenu.all.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/ace-responsive-menu.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/snackbar.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/simplebar.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/parallax.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/scrollto.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.counterup.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/progressbar.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/slider.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/timepicker.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/js/main.js"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/script.js"></script>
@endpush
