@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url(img/otro2_dashboard.jpg);">
    {{-- style="background-image: url(img/familia_dashboard.jpg);" --}}
        <div class="lg-inner-column">
            <div class="left-columns lg:w-1/2 lg:block hidden">
                <div class="logo-box-3">
                    <a heref="index.html" class="">
                        {{-- <img src="assets/images/logo/logo-white.svg" alt=""> --}}
                    </a>
                </div>
            </div>
            <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
                <div class="auth-box-3">
                    <div class="mobile-logo text-center mb-6 lg:hidden block">
                        <a heref="index.html">
                            <img src="assets/images/logo/logo.svg" alt="" class="mb-10 dark_logo">
                            <img src="assets/images/logo/logo-white.svg" alt="" class="mb-10 white_logo">
                        </a>
                    </div>
                    <div class="text-center 2xl:mb-10 mb-5">
                        <h4 class="font-medium">Iniciar sesión</h4>
                        <div class="text-slate-500 dark:text-slate-400 text-base">
                            Inicie sesión con su cuenta
                        </div>
                    </div>
                    <!-- BEGIN: Login Form -->
                    <form class="space-y-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="fromGroup">
                            <label class="block capitalize form-label">Correo electrónico</label>
                            <div class="relative ">
                                <input type="email" name="email" id="email"
                                    class="form-control py-2 @error('email') is-invalid @enderror" required autocomplete>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Credenciales no válidas</strong>
                                    </span>
                                @enderror


                            </div>
                        </div>
                        <div class="fromGroup">
                            <label class="block capitalize form-label">Contraseña</label>
                            <div class="relative ">
                                <input type="password" id="password" name="password"
                                    class="  form-control py-2   @error('password') is-invalid @enderror" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="flex justify-between">
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="hiddens">
                                <span class="text-slate-500 dark:text-slate-400 text-sm leading-6 capitalize">Keep me signed
                                    in</span>
                            </label>
                            <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium"
                                href="forget-password-one.html">Forgot
                                Password?
                            </a>
                        </div> --}}
                        <button class="btn btn-dark block w-full text-center">Iniciar sesión</button>
                    </form>
                    <!-- END: Login Form -->
                    <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                        <div
                            class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                            O {{-- Or continue with --}}
                        </div>
                    </div>
                    {{-- <div class="max-w-[242px] mx-auto mt-8 w-full">

                        <!-- BEGIN: Social Log in Area -->
                        <ul class="flex">
                            <li class="flex-1">
                                <a href="#"
                                    class="inline-flex h-10 w-10 bg-[#1C9CEB] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <img src="assets/images/icon/tw.svg" alt="">
                                </a>
                            </li>
                            <li class="flex-1">
                                <a href="#"
                                    class="inline-flex h-10 w-10 bg-[#395599] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <img src="assets/images/icon/fb.svg" alt="">
                                </a>
                            </li>
                            <li class="flex-1">
                                <a href="#"
                                    class="inline-flex h-10 w-10 bg-[#0A63BC] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <img src="assets/images/icon/in.svg" alt="">
                                </a>
                            </li>
                            <li class="flex-1">
                                <a href="#"
                                    class="inline-flex h-10 w-10 bg-[#EA4335] text-white text-2xl flex-col items-center justify-center rounded-full">
                                    <img src="assets/images/icon/gp.svg" alt="">
                                </a>
                            </li>
                        </ul>
                        <!-- END: Social Log In Area -->
                    </div>  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                    <div
                        class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                        {{-- Already registered? --}}
                        <a href="signup-one.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                            <a class="nav-link" href="{{ url('register_member') }}"> Registro miembro</a>
                        </a>
                    </div>

                    <div
                    class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                    {{-- Already registered? --}}
                    <a href="signup-one.html" class="text-slate-900 dark:text-white font-medium hover:underline">
                        <a class="nav-link" href="{{ route('register') }}">  Registro cohort</a>
                    </a>
                </div>
                </div>
            </div>
            {{-- <div class="auth-footer3 text-white py-5 px-5 text-xl w-full">
                Unlock your Project performance
            </div> --}}
        </div>
    </div>
    <!-- Core Js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection
