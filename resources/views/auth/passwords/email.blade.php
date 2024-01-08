@extends('layouts.app')

@section('content')



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/rt-plugins.css">
<link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<!-- START : Theme Config js-->
<script src="{{ asset('assets/js/settings.js') }}" sync></script>
<!-- END : Theme Config js-->


<div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url(../img/otro2_dashboard.jpg);">
    <div class="lg-inner-column">
        <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
                <a heref="index.html" class="">
                    <img src="assets/images/logo/logo-white.svg" alt="">
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
                    <h4 class="font-medium mb-4">¿Olvido su contraseña?</h4>
                    <div class="text-slate-500 dark:text-slate-400 text-base">
                        Restablecer contraseña con codigo
                    </div>
                </div>

                <!-- BEGIN: Forgot Password Form -->

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-6" align="center">
                            <button class="btn btn-dark block w-full text-center">Enviar email de recuperación</button>
                        </div>
                    </div>
                </form>
                <!-- END: Forgot Password Form -->
                <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                    <div class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                        <b>* No has podido recuperar tu contraseña, contacta a tu Pastor</b>
                    </div>
                </div>
                <br>
                <br>

                <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                    <div class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                        O continua con
                    </div>
                </div>
                <div class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">

                    <a href="{{url('/')}}" class="text-slate-900 dark:text-white font-medium hover:underline">
                        Inicio de Sesion
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- scripts -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection