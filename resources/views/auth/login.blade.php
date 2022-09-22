  @extends('layouts.guest')


  @section('content')
      <section class="our-log-reg">
          <div class="container">
              <div class="align-items-center justify-content-center row">
                  <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4">
                      @include('flash::message')
                      <div class="login_form">
                          <form method="post" action="{{ url('/login') }}">
                              @csrf
                              <div class="heading">
                                  <h3 class="text-center">Login</h3>
                                  <p class="text-center">
                                      Don't have an account? <a class="text-thm"
                                          href="{{ route('register') }}">Create a Profile!</a>
                                  </p>
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

                              <div class="form-check form-group ">
                                  <a class="float-right mb-3 tdu text-thm" href="{{ route('reset.request') }}"
                                      style="margin-top: -15px;">
                                      Forgot Password?
                                  </a>
                              </div>
                              <button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
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
