@extends('layouts.guest')

@section('content')
    <section class="our-log-reg">
        <div class="container">
            <div class="align-items-center justify-content-center row">

                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <div class="sign_up_form pb-1">
                        <div class="heading">
                            <h3 class="text-center">Create New Account</h3>
                            <p class="text-center">Have an account? <a class="text-thm"
                                    href="{{ route('login') }}">Sign In!</a>
                            </p>
                        </div>
                        <form method="post" action="{{ url('/register') }}" class="text-left w-100">
                            @csrf
                            <b-row>
                                <b-col cols="12">
                                    <input type="text"
                                        class="form-control {{ $errors->has('names') ? 'is-invalid' : '' }}" name="names"
                                        value="{{ old('names') }}" placeholder="Full Name">
                                    @if ($errors->has('names'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('names') }}</strong>
                                        </span>
                                    @endif
                                </b-col>
                                <b-col cols="12">
                                    <input type="text"
                                        class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                        name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone number">
                                    @if ($errors->has('phone_number'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </b-col>
                                <b-col cols="12">
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </b-col>
                                <b-col cols="12">
                                    <select name="nationality"
                                        class="form-control custom-select  {{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                                        value="{{ old('nationality') }}">
                                        <option value="" selected disabled>Select nationality</option>
                                        @foreach ($nationalities as $nationality)
                                            <option value="{{ $nationality->id }}">{{ $nationality->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('nationality'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('nationality') }}</strong>
                                        </span>
                                    @endif
                                </b-col>
                                <b-col cols="12">

                                    <select name="gender"
                                        class="form-control custom-select {{ $errors->has('gender') ? 'is-invalid' : '' }}"
                                        value="{{ old('gender') }}">
                                        <option value="" selected disabled>Select gender</option>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </b-col>

                                <b-col cols="12">
                                    <div class="input-group mb-3" id="show_hide_password">
                                        <input type="password"
                                            class="form-control mb-0 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback px-2 py-1 rounded text-white bg-danger">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </b-col>

                                <b-col cols="12" class="mb-3">
                                    <div class="input-group mb-3" id="show_hide_password">
                                        <input type="password" name="password_confirmation"
                                            class="form-control mb-0 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            placeholder="Confirm password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </b-col>

                            </b-row>
                            <button class="border-0 btn btn-block btn-primary font-lg text-uppercase text-white"
                                type="submit">Next</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('css')
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    @endpush
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
@endsection
