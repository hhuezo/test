<?php /*@extends('layouts.app')
@section('content')

    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
*/
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Dashcode - HTML Template</title>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->

</head>

<body class=" font-inter skin-default">
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <main class="app-wrapper">
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                <!-- BEGIN: Header -->
                <div class="z-[12]" id="app_header">
                    <div class="app-header   rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
                        <div class="flex justify-between items-center h-full">
                            <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                                <a href="index.html" class="mobile-logo xl:hidden inline-block">
                                    <img src="{{ asset('assets/images/logo/logo-c.svg') }}" class="black_logo" alt="logo">
                                    <img src="{{ asset('assets/images/logo/logo-c-white.svg') }}" class="white_logo" alt="logo">
                                </a>
                                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                                    <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                                </button>


                            </div>
                            <!-- end vertcial -->





                            <!-- end top menu -->
                            <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

                                <!-- BEGIN: Language Dropdown  -->

                                <div class="relative">
                                    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
                                                    inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{-- <iconify-icon icon="circle-flags:uk" class="mr-0 md:mr-2 rtl:ml-2 text-xl">
                                        </iconify-icon> --}}

                                        @if (App::getLocale() == 'en')
                                        <img src="{{ asset('') }}/img/eng.png" style="width: 25px;">
                                        <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
                                            &nbsp;Eng</span>
                                        @else
                                        <img src="{{ asset('') }}/img/esp.png" style="width: 25px;">
                                        <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
                                            &nbsp;Esp</span>
                                        @endif
                                    </button>
                                    <!-- Language Dropdown menu -->
                                    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md
                                        overflow-hidden">
                                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">

                                            @if (config('locale.status') && count(config('locale.languages')) > 1)
                                            @foreach (array_keys(config('locale.languages')) as $lang)
                                            <li>
                                                <a href="{!! route('lang.swap', $lang) !!}" class="flex items-center px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                    @if ($lang == 'es')
                                                    <img src="{{ asset('img/esp.png') }}" style="width: 25px;">
                                                    <span class="font-medium">&nbsp;ESP</span>
                                                    @else
                                                    <img src="{{ asset('img/eng.png') }}" style="width: 25px;">
                                                    <span class="font-medium">&nbsp;ENG</span>
                                                    @endif
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!-- Theme Changer -->
                                <!-- END: Language Dropdown -->

                                <!-- BEGIN: Toggle Theme -->









                                <!-- END: Header -->
                                <button class="smallDeviceMenuController md:hidden block leading-0">
                                    <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                                </button>
                                <!-- end mobile menu -->
                            </div>
                            <!-- end nav tools -->
                        </div>
                    </div>
                </div>

                <!-- BEGIN: Search Modal -->
                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                    <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
                        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
                            <form>
                                <div class="relative">
                                    <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                                    <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                                        <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END: Search Modal -->
                <!-- END: Header -->
                <!-- END: Header -->
                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">
                                {{-- @yield('contenido') --}}







                                <div class="page-content">
                                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                                        <div id="content_layout">

                                            <div class="grid grid-cols-12 gap-5 mb-5">
                                                <div class="2xl:col-span-2 lg:col-span-2 col-span-12">
                                                    &nbsp;
                                                </div>
                                                <div class="2xl:col-span-6 lg:col-span-8 col-span-12">
                                                    <div class="card">
                                                        <div class="card-body flex flex-col p-6">
                                                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                                                <div class="flex-1">
                                                                    <div class="card-title text-slate-900 dark:text-white">
                                                                        {{ __('organization.Register') }}
                                                                        <h1>
                                                                        </h1>
                                                                    </div>
                                                                </div>

                                                                <a href="{{ URL('login') }}">
                                                                    <button class="btn btn-dark float-right">login</button>
                                                                </a>
                                                            </header>

                                                            @if (count($errors) > 0)
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                            @endif

                                                            <form method="POST" action="{{ route('store_member') }}" class="space-y-4">
                                                                @csrf
                                                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.Name') }}</label>
                                                                        <input type="text" name="name" required class="form-control" value="{{ old('name') }}" autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Apellido</label>
                                                                        <input type="text" name="last_name" required class="form-control" value="{{ old('last_name') }}" autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Fecha nacimiento</label>
                                                                        <input type="date" name="birthdate" required class="form-control" value="{{ old('birthdate') }}" autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.Email') }}</label>
                                                                        <input type="email" name="email" required class="form-control" value="{{ old('email') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.Password') }}</label>
                                                                        <input type="password" name="password" required class="form-control">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.ConfirmePassword') }}</label>
                                                                        <input type="password" name="password_confirmation" required class="form-control">
                                                                    </div>


                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Organización</label>
                                                                        <select name="organization_id" class="form-control">
                                                                            @foreach ($organizations as $obj)
                                                                            <option value="{{ $obj->id }}">
                                                                                {{ $obj->name }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        &nbsp;
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Número documento</label>
                                                                        <input type="text" name="document_number" data-inputmask="'mask': ['99999999-9']" required class="form-control" value="{{ old('document_number') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.Phone') }}</label>
                                                                        <input type="text" name="phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ old('phone_number') }}">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Departamento</label>
                                                                        <select id="Departamento" name="Departamento" class="form-control">
                                                                            @foreach ($departamentos as $obj)
                                                                            <option value="{{ $obj->id }}">
                                                                                {{ $obj->nombre }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Municipio</label>
                                                                        <select id="Municipio" name="Municipio" class="form-control select2">
                                                                            @foreach ($municipios as $obj)
                                                                            <option value="{{ $obj->id }}" {{ old('Municipio') == $obj->id ? 'selected' : '' }}>
                                                                                {{ $obj->nombre }}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>



                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">{{ __('organization.Address') }}</label>
                                                                        <textarea name="address" required class="form-control" rows="5">{{ old('address') }}</textarea>
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Acerca de mi</label>
                                                                        <textarea name="about_me" class="form-control" rows="5">{{ old('about_me') }}</textarea>
                                                                    </div>

                                                                </div>
                                                                <div style="text-align: right;">
                                                                    <button type="submit" class="btn inline-flex justify-center btn-dark">{{ __('organization.Acept') }}</button>
                                                                </div>


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                                                <!-- Basic Inputs -->


                                            </div>


                                        </div>
                                    </div>
                                </div>



























                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
                backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
                <a href="chat.html">
                    <div>
                        <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
                            <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                            <span class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
                                10
                            </span>
                        </span>
                        <span class="block text-[11px] text-slate-600 dark:text-slate-300">
                            Messages
                        </span>
                    </div>
                </a>
                <a href="profile.html" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
                h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                    <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="" class="w-full h-full rounded-full border-2 border-slate-100">
                    </div>
                </a>
                <a href="#">
                    <div>
                        <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900">
                            <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
                            <span class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
                                2
                            </span>
                        </span>
                        <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
                            Notifications
                        </span>
                    </div>
                </a>
            </div>
        </div>


    </main>






    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //combo para Departamento
            $("#Departamento").change();
            $("#Departamento").change(function() {


                // var para la Departamento
                var Departamento = $(this).val();

                $.get("{{ url('get_municipio/') }}" + '/' + Departamento, function(data) {

                    console.log(data);
                    var _select = ''
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                        '</option>';

                    $("#Municipio").html(_select);

                });

            });

        });
    </script>
</body>

</html>