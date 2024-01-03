<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light semiDark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Urban Strategies</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/favicon.svg') }}">
    <!-- BEGIN: Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- END: Google Font -->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/sidebar-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/SimpleBar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- END: Theme CSS-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <script src="{{ asset('assets/js/iconify-icon.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" sync></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#myTable2').DataTable();
        });
    </script>

    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }

        /* .btn-dark {
            background-color: #740816;
        } */

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

</head>

<body class=" font-inter dashcode-app" id="body_class">
    <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
    <main class="app-wrapper">
        <!-- BEGIN: Sidebar -->
        <!-- BEGIN: Sidebar -->
        <div class="sidebar-wrapper group">
            <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
            <div class="logo-segment">
                <a class="flex items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/') }}/urban.png" class="black_logo" alt="logo">

                    <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">
                        Urban Strategies
                    </span>
                </a>
                <!-- Sidebar Type Button -->

            </div>
            <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none opacity-0">
            </div>
            <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
                <ul class="sidebar-menu">
                    @can('approve organization')
                    <!--   <li class="sidebar-menu-title">ACTIVAR</li>
                                <li class="">
                                    <a href="{{ url('members') }}" class="navItem">
                                        <span class="flex items-center">
                                            <iconify-icon class=" nav-icon" icon="heroicons-outline:clipboard-check">
                                            </iconify-icon>
                                            <span>Activar miembro</span>
                                        </span>
                                    </a>
                                </li>

                                <li class="">
                                    <a href="{{ url('organizations') }}" class="navItem">
                                        <span class="flex items-center">
                                            <iconify-icon class=" nav-icon" icon="heroicons-outline:clipboard-check">
                                            </iconify-icon>
                                            <span>Activar organización</span>
                                        </span>
                                    </a>
                                </li>-->
                    @endcan
                    @can('read users')
                    <li class="">
                        <a href="#" class="navItem">
                            <span class="flex items-center">
                                <iconify-icon class=" nav-icon" icon="heroicons-outline:user"></iconify-icon>
                                <span>Seguridad</span>
                            </span>
                            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('seguridad/user') }}">Usuario</a>
                            </li>
                            <li>
                                <a href="{{ url('seguridad/role') }}">Rol</a>
                            </li>
                            <li>
                                <a href="{{ url('seguridad/permission') }}">Permisos</a>
                            </li>
                        </ul>
                    </li>
                    @endcan


                    @can('read catalogo')

                    <li class="">
                        <a href="#" class="navItem">
                            <span class="flex items-center">
                                <iconify-icon class=" nav-icon" icon="clarity:list-line"></iconify-icon>
                                <span>Catalogos</span>
                            </span>
                            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                        </a>
                        <ul class="sidebar-submenu">


                            <li>
                                <a href="{{ url('catalog/organization_status') }}">Estado del Iglesia</a>
                            </li>
                            <!-- <li>
                                <a href="{{ url('catalog/Quiz') }}">Examen</a>
                            </li>-->
                            <li>
                                <a href="{{ url('catalog/member_status') }}">Estatus del Participantes</a>
                            </li>
                            <li>
                                <a href="{{ url('catalog/wizard_church_questions') }}">Preguntas para la iglesia</a>
                            </li>
                            <li>
                                <a href="{{ url('catalog/region') }}">Region</a>
                            </li>
                            <li>
                                <a href="{{ url('catalog/cohorte') }}">Cohorte</a>
                            </li>

                            <li>
                                <a href="{{ url('catalog/sede') }}">Sede</a>
                            </li>
                            <li>
                                <a href="{{ url('catalog/plan_estudios') }}">Cursos para Plan de Estudios</a>
                            </li>
                            <li>
                                <a href="{{ url('administracion/iglesia_plan_estudio') }}">Plan de estudio</a>
                            </li>

                            <!-- <li>
                                <a href="{{ url('administracion/reportes') }}">Reportes</a>
                            </li> -->

                            <li>
                                <a href="{{ url('administracion/configuracion_correos') }}">Configuracion Correos</a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="">
                        <a href="#" class="navItem">
                            <span class="flex items-center">
                                <iconify-icon class=" nav-icon" icon="ic:outline-book"></iconify-icon>
                                <span>Cursos</span>
                            </span>
                            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                        </a>
                        <ul class="sidebar-submenu">
                            <li>
                                <a href="{{ url('catalog/course') }}">Cursos</a>
                    </li>
                    <li>
                        <a href="{{ url('catalog/plan_estudios') }}">Plan de Estudios</a>
                    </li>
                    <li>
                        <a href="{{ url('catalog/question') }}">Preguntas</a>
                    </li>
                    <li>
                        <a href="{{ url('catalog/answer') }}">Respuesta</a>
                    </li>
                </ul>
                </li> --}}

                <li class="">
                    <a href="#" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="lucide:church"></iconify-icon>
                            <span>Iglesias</span>
                        </span>
                        <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ url('catalog/iglesia') }}">Iglesias</a>
                        </li>
                        {{-- <li>
                                <a href="{{ url('catalog/Iglesiauser') }}">Usuario Iglesias</a>
                </li> --}}
                <li>
                    <a href="{{ url('catalog/grupo') }}">Grupo Iglesias</a>
                </li>
                <li>
                    <a href="{{ url('catalog/member') }}">Participantes</a>
                </li>
                <li>
                    <a href="{{ url('catalog/answerreg') }}">Respuestas del Registro <br> de la iglesia</a>
                </li>
                </ul>
                </li>

                @endcan
                @can('datos iglesia')
                <li>
                    <a href="{{ url('administracion/datos_iglesia') }}" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:document"></iconify-icon>
                            <span>Datos Generales Iglesia</span>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('administracion/iglesia_plan_estudio') }}" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:document"></iconify-icon>
                            <span>Plan de Estudio</span>
                        </span>
                    </a>
                </li>

                @endcan

                @can('participante')
                <li class="">
                    <a href="#" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="ic:outline-book"></iconify-icon>
                            <span>Asistencias</span>
                        </span>
                        <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                    </a>
                    <ul class="sidebar-submenu">

                        <li>
                            <a href="{{ url('administracion/iglesia_plan_estudio/control_participante') }}">Control de Asitencia </a>
                        </li>
                        <li>
                            <a href="{{ url('catalog/modificar_datos_participante') }}">Modificar Datos Personales </a>
                        </li>
                        <!--  <li>
                                <a href="{{ url('catalog/question') }}">Preguntas</a>
                            </li>
                            <li>
                                <a href="{{ url('catalog/answer') }}">Respuesta</a>
                            </li> -->
                    </ul>
                </li>
                @endcan
                <li>
                    <a href="{{ url('datos_cohort') }}" class="navItem">
                        <span class="flex items-center">
                            <iconify-icon class="nav-icon" icon="heroicons-outline:document"></iconify-icon>
                            <span>Cohorts</span>
                        </span>
                    </a>
                </li>


                {{-- @can('read course')
                    <li>
                        <a href="{{ url('courses') }}" class="navItem">
                <span class="flex items-center">
                    <iconify-icon class="nav-icon" icon="heroicons-outline:document"></iconify-icon>
                    <span>Cursos</span>
                </span>
                </a>
                </li>
                @endcan --}}

                </ul>

            </div>
        </div>

        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <!-- BEGIN: Header -->
                <!-- BEGIN: Header -->
                <div class="z-[9]" id="app_header">
                    <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
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





                            <!-- end top menu -->
                            <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">


                                <div class="relative md:block hidden">
                                    <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
                                            rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
                                        <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
                                            justify-center rounded-full text-white z-[99]">
                                            4</span>
                                    </button>
                                    <!-- Notifications Dropdown -->
                                    <div class="dropdown-menu z-10 hidden bg-white shadow w-[335px]
                                                    dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
                                        <div class="flex items-center justify-between py-4 px-4">
                                            <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">
                                                Notifications</h3>
                                            <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See All</a>
                                        </div>
                                        <div class="" role="none">
                                            <div class="bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-800 block w-full px-4 py-2 text-sm relative">
                                                <div class="flex ltr:text-left rtl:text-right">
                                                    <div class="flex-none ltr:mr-3 rtl:ml-3">
                                                        <div class="h-8 w-8 bg-white rounded-full">
                                                            <img src="{{ asset('assets/images/all-img/user.png') }}" alt="user" class="border-white block w-full h-full object-cover rounded-full border">
                                                        </div>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                                                            before:top-0 before:left-0">
                                                            Your order is placed</a>
                                                        <div class="text-slate-500 dark:text-slate-200 text-xs leading-4">
                                                            Amet minim mollit non deser unt ullamco est sit
                                                            aliqua.</div>
                                                        <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                                                            3 min ago
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                                                <div class="flex ltr:text-left rtl:text-right relative">
                                                    <div class="flex-none ltr:mr-3 rtl:ml-3">
                                                        <div class="h-8 w-8 bg-white rounded-full">
                                                            <img src="{{ asset('assets/images/all-img/user2.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                                                        </div>
                                                    </div>
                                                    <div class="flex-1">
                                                        <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                                                            before:top-0 before:left-0">
                                                            Congratulations Darlene 🎉</a>
                                                        <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">
                                                            Won the monthly best seller badge</div>
                                                        3 min ago
                                                    </div>
                                                </div>
                                                <div class="flex-0">
                                                    <span class="h-[10px] w-[10px] bg-danger-500 border border-white dark:border-slate-400 rounded-full inline-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                                            <div class="flex ltr:text-left rtl:text-right relative">
                                                <div class="flex-none ltr:mr-3 rtl:ml-3">
                                                    <div class="h-8 w-8 bg-white rounded-full">
                                                        <img src="{{ asset('assets/images/all-img/user3.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                                                            before:top-0 before:left-0">
                                                        Revised Order 👋</a>
                                                    <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">
                                                        Won the monthly best seller badge</div>
                                                    <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">3 min
                                                        ago</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                                            <div class="flex ltr:text-left rtl:text-right relative">
                                                <div class="flex-none ltr:mr-3 rtl:ml-3">
                                                    <div class="h-8 w-8 bg-white rounded-full">
                                                        <img src="{{ asset('assets/images/all-img/user4.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                                                before:top-0 before:left-0">
                                                        Brooklyn Simmons</a>
                                                    <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">
                                                        Added you to Top Secret Project group...</div>
                                                    <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                                                        3 min ago
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Notification Dropdown -->

                                <!-- BEGIN: Profile Dropdown -->
                                <!-- Profile DropDown Area -->
                                <div class="md:block hidden w-full">
                                    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
                                        inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                                            <img src="{{ asset('assets/images/all-img/user.png') }}" alt="user" class="block w-full h-full object-cover rounded-full">
                                        </div>
                                        <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">
                                            @if (auth()->user())
                                            {{ auth()->user()->name }}
                                            @endif
                                        </span>
                                        <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
                                            overflow-hidden">
                                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                                            <li>
                                                <a href="{{ url('/home') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                                                    dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:user" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Dashboard</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{ url('courses') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                                                    dark:text-white font-normal">
                                                    <iconify-icon icon="heroicons-outline:clipboard-check" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Cursos</span>
                                                </a>
                                            </li>


                                            <li>
                                                <a class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
                                                    dark:text-white font-normal" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                    <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1">
                                                    </iconify-icon>
                                                    <span class="font-Inter">Cerrar sesión</span>
                                                </a>

                                            </li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
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
                                @yield('contenido')






                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BEGIN: Footer For Desktop and tab -->
            <footer class="md:block hidden" id="footer">
                <div class="site-footer px-6 bg-white dark:bg-slate-800 text-slate-500 dark:text-slate-300 py-4 ltr:ml-[248px] rtl:mr-[248px]">
                    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-5">
                        {{-- <div class="text-center ltr:md:text-start rtl:md:text-right text-sm">
                            COPYRIGHT ©
                            <span id="thisYear"></span>
                            DashCode, All rights Reserved
                        </div>
                        <div class="ltr:md:text-right rtl:md:text-end text-center text-sm">
                            Hand-crafted &amp; Made by
                            <a href="https://codeshaper.net" target="_blank" class="text-primary-500 font-semibold">
                                Codeshaper
                            </a>
                        </div> --}}
                    </div>
                </div>
            </footer>
            <!-- END: Footer For Desktop and tab -->
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

    <!-- Core Js -->
    {{-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/SimpleBar.js') }}"></script>

    <script src="{{ asset('assets/js/iconify.js') }}"></script>
    <!-- Jquery Plugins -->


    <!-- app js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>



</body>

</html>
