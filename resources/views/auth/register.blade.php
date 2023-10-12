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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/rt-plugins.css">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->

    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body class=" font-inter skin-default">



    <div class="content-wrapper transition-all duration-150" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div class="space-y-5">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="xl:col-span-2 col-span-12 lg:col-span-5 ">
                                &nbsp;
                            </div>
                            <div class="xl:col-span-8 col-span-12 lg:col-span-7">
                                <div class="card h-full">
                                    <div class="wizard card">
                                        <div class="card-header">
                                            <h4 class="card-title">Registro de iglesia</h4>
                                        </div>

                                        <div class="card-body p-6">
                                            <div class="grid gap-5 grid-cols-12">
                                                <div class="lg:col-span-3 col-span-12">
                                                    <div
                                                        class="flex z-[5] items-start relative flex-col lg:min-h-full md:min-h-[300px] min-h-[250px] wizard-steps">

                                                        <div
                                                            class="relative z-[1] flex-1 last:flex-none wizard-step active">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 1</span>

                                                                    <span class="text-3xl no-icon">
                                                                        <iconify-icon icon="bx:check-double">
                                                                        </iconify-icon>
                                                                    </span>
                                                                </div>


                                                            </div>

                                                            <div class="bar-line2"></div>
                                                            <div
                                                                class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                                                            text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                                                <span class="w-max block">Datos de cuenta</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 2</span>

                                                                    <span class="text-3xl no-icon">
                                                                        <iconify-icon icon="bx:check-double">
                                                                        </iconify-icon>
                                                                    </span>
                                                                </div>


                                                            </div>

                                                            <div class="bar-line2"></div>
                                                            <div
                                                                class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                                                        text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                                                <span class="w-max block">Personal info</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                            bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 3</span>

                                                                    <span class="text-3xl no-icon">
                                                                        <iconify-icon icon="bx:check-double">
                                                                        </iconify-icon>
                                                                    </span>
                                                                </div>


                                                            </div>

                                                            <div class="bar-line2"></div>
                                                            <div
                                                                class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                                                            text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                                                <span class="w-max block">Address</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 4</span>

                                                                    <span class="text-3xl no-icon">
                                                                        <iconify-icon icon="bx:check-double">
                                                                        </iconify-icon>
                                                                    </span>
                                                                </div>


                                                            </div>

                                                            <div class="bar-line2"></div>
                                                            <div
                                                                class="absolute top-0 ltr:left-full rtl:right-full ltr:pl-4 rtl:pr-4 text-base leading-6 md:mt-3 mt-1 transition duration-150 w-full
                                                            text-slate-500 dark:text-slate-300 dark:text-opacity-40">
                                                                <span class="w-max block">Address</span>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="conten-box lg:col-span-9 col-span-12 h-full">
                                                    <form>
                                                        <div class="wizard-form-step active" data-step="1">
                                                            <div
                                                                class="grid lg:grid-cols-12 md:grid-cols-1 grid-cols-1 gap-5">

                                                                <div class="input-area">
                                                                    <label for="username" class="form-label">Nombre de
                                                                        inglesia</label>
                                                                    <input id="nombre" name="nombre" type="text"
                                                                        class="form-control">
                                                                        <input id="departamento" name="departamento" type="hidden"
                                                                        class="form-control">
                                                                </div>



                                                                <div id="div_result">


                                                                </div>

                                                                <div class="mt-6 space-x-3 text-right">

                                                                    <button class="btn btn-dark"
                                                                        type="button">Siguiente</button>
                                                                </div>












                                                                {{-- <div
                                                                    class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <h4
                                                                        class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                        Ingrese los datos</h4>
                                                                </div> --}}
                                                                {{-- <div class="input-area">
                                                                    <label for="username" class="form-label">Nombre</label>
                                                                    <input id="username" type="text"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="fullname" class="form-label">Apellido</label>
                                                                    <input id="fullname" type="text"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="email"
                                                                        class="form-label">Email*</label>
                                                                    <input id="email" type="text"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="phonenumber"
                                                                        class="form-label">Número telefónico</label>
                                                                    <input id="phonenumber" type="text"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="password"
                                                                        class="form-label">Contraseña*</label>
                                                                    <input id="password" type="password"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="confirmPassword"
                                                                        class="form-label">Confirme contraseña</label>
                                                                    <input id="confirmPassword" type="password"
                                                                        class="form-control">
                                                                </div> --}}















                                                            </div>
                                                        </div>
                                                        <div class="wizard-form-step" data-step="2">
                                                            <div
                                                                class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <h4
                                                                        class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                        Personal Information</h4>
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="firstname" class="form-label">First
                                                                        Name*</label>
                                                                    <input id="firstname" type="text"
                                                                        class="form-control" placeholder="First">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="lastname" class="form-label">Last
                                                                        Name*</label>
                                                                    <input id="lastname" type="text"
                                                                        class="form-control" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wizard-form-step" data-step="3">
                                                            <div
                                                                class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <h4
                                                                        class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                        Address</h4>
                                                                </div>
                                                                <div
                                                                    class="input-area lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <label for="address"
                                                                        class="form-label">Address*</label>
                                                                    <textarea name="address" id="address" rows="3" class="form-control" placeholder="Your Address"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="wizard-form-step" data-step="4">
                                                            <div
                                                                class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <h4
                                                                        class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                        Social Links</h4>
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="fblink" class="form-label">Facebook
                                                                        Link*</label>
                                                                    <input id="fblink" type="url"
                                                                        class="form-control"
                                                                        placeholder="Facebook Link">
                                                                </div>
                                                                <div class="input-area">
                                                                    <label for="youtubelink"
                                                                        class="form-label">Youtube
                                                                        Link*</label>
                                                                    <input id="youtubelink" type="url"
                                                                        class="form-control"
                                                                        placeholder="Youtube Link">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- <div class="mt-6 space-x-3 text-right">
                                                            <button class="btn btn-dark prev-button" type="button"
                                                                style="display: none;">prev</button>
                                                            <button class="btn btn-dark next-button"
                                                                type="button">Siguiente</button>
                                                        </div> --}}

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-2 col-span-12 space-y-5">
                                &nbsp;
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

















    <main class="app-wrapper">
        <div class="flex flex-col justify-between min-h-screen">
            <div>

                <div class="space-y-5">
                    <div class="grid grid-cols-12 gap-5">



                    </div>
                </div>



                <div class="content-wrapper transition-all duration-150" id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">
                                {{-- @yield('contenido') --}}

                                <div class="grid gap-5 grid-cols-12">

                                    <div class="lg:col-span-6 col-span-12">


                                    </div>
                                </div>
                                {{--
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
                                                            <header
                                                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                                                <div class="flex-1">
                                                                    <div
                                                                        class="card-title text-slate-900 dark:text-white">
                                                                        {{ __('organization.Register') }} <h1>
                                                                        </h1>
                                                                    </div>
                                                                </div>

                                                                <a href="{{ URL('login') }}">
                                                                    <button
                                                                        class="btn btn-dark float-right">login</button>
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

                                                            <form method="POST" action="{{ route('register') }}"
                                                                class="space-y-4">
                                                                @csrf
                                                                <div
                                                                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Name') }}</label>
                                                                        <input type="text" name="name" required
                                                                            class="form-control"
                                                                            value="{{ old('name') }}"
                                                                            autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Email') }}</label>
                                                                        <input type="email" name="email" required
                                                                            class="form-control"
                                                                            value="{{ old('email') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Password') }}</label>
                                                                        <input type="password" name="password"
                                                                            required class="form-control">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.ConfirmePassword') }}</label>
                                                                        <input type="password"
                                                                            name="password_confirmation" required
                                                                            class="form-control">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Organization') }}</label>
                                                                        <input type="text" name="name_organization"
                                                                            required class="form-control"
                                                                            value="{{ old('name_organization') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Phone') }}</label>
                                                                        <input type="text" name="phone_number"
                                                                            required class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('phone_number') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Address') }}</label>
                                                                        <textarea name="address" required class="form-control" rows="5">{{ old('address') }}</textarea>
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.Note') }}</label>
                                                                        <textarea name="notes" class="form-control" rows="5">{{ old('notes') }}</textarea>
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.MainContact') }}</label>
                                                                        <input type="text" name="contact_name"
                                                                            required class="form-control"
                                                                            value="{{ old('contact_name') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.JobMainContact') }}</label>
                                                                        <input type="text" name="contact_job_title"
                                                                            class="form-control"
                                                                            value="{{ old('contact_job_title') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.MainContactPhone') }}</label>
                                                                        <input type="text"
                                                                            name="contact_phone_number"
                                                                            class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('contact_phone_number') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.MainContactPhone2') }}</label>
                                                                        <input type="text"
                                                                            name="contact_phone_number_2"
                                                                            class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('contact_phone_number_2') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.SecondaryContact') }}</label>
                                                                        <input type="text"
                                                                            name="secondary_contact_name"
                                                                            class="form-control"
                                                                            value="{{ old('secondary_contact_name') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.JobSecondaryContact') }}</label>
                                                                        <input type="text"
                                                                            name="secondary_contact_job_title"
                                                                            class="form-control"
                                                                            value="{{ old('secondary_contact_job_title') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.SecondaryContactPhone') }}</label>
                                                                        <input type="text"
                                                                            name="secondary_contact_phone_number"
                                                                            class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('secondary_contact_phone_number') }}">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">{{ __('organization.SecondaryContactPhone2') }}</label>
                                                                        <input type="text"
                                                                            name="secondary_contact_phone_number_2"
                                                                            class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('secondary_contact_phone_number_2') }}">
                                                                    </div>

                                                                </div>
                                                                <div style="text-align: right;">
                                                                    <button type="submit"
                                                                        class="btn inline-flex justify-center btn-dark">{{ __('organization.Acept') }}</button>
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
                                </div> --}}



























                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
                backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
                <a href="chat.html">
                    <div>
                        <span
                            class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
                            <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
                            <span
                                class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
                                10
                            </span>
                        </span>
                        <span class="block text-[11px] text-slate-600 dark:text-slate-300">
                            Messages
                        </span>
                    </div>
                </a>
                <a href="profile.html"
                    class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
                h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
                    <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
                        <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt=""
                            class="w-full h-full rounded-full border-2 border-slate-100">
                    </div>
                </a>
                <a href="#">
                    <div>
                        <span
                            class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900">
                            <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
                            <span
                                class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
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



    <script>
        google.charts.load('current', {
            'packages': ['geochart']
        });

        $(document).ready(function() {
            get_map('A');
        });


        function get_map(dep) {
            //console.log(dep);
            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ url('get_map') }}/" + dep, // La URL de la solicitud
                type: "GET", // Método de la solicitud (GET en este caso)
                //dataType: "json", // Tipo de datos esperados en la respuesta (puedes ajustarlo según tus necesidades)

                // Función que se ejecuta cuando la solicitud es exitosa
                success: function(data) {
                    //console.log(data);
                    // Pintar la respuesta en el div_result
                    $("#div_result").html(data);
                },

                // Función que se ejecuta si la solicitud falla
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                }
            });
        }
    </script>
</body>

</html>
