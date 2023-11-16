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

        .altura {
            height: 600px;
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
                                            <h4 class="card-title"  align="center">Registro de Iglesia</h4>
                                        </div>
                                        <div class="card-body p-6">
                                            <!-- inicio de step -->
                                            <div
                                                class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                                                <div class="active relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step="1" id="div1">
                                                    <div class="number-box">
                                                        <span class="number">
                                                            1
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">

                                                    </div>
                                                </div>
                                                @for ($i = 2; $i <= count($questions) + 3; $i++)
                                                    <div
                                                        class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step">
                                                        <div class="number-box">
                                                            <span class="number">
                                                                {{ $i }}
                                                            </span>
                                                            <span class="no-icon text-3xl">
                                                                <iconify-icon icon="bx:check-double"></iconify-icon>
                                                            </span>
                                                        </div>
                                                        <div class="bar-line"></div>
                                                        <div class="circle-box">
                                                            <span class="w-max"></span>
                                                        </div>
                                                    </div>
                                                @endfor




                                            </div>
                                            <!-- fin of step -->
                                            <!-- inicio del form -->
                                            <form class="wizard-form mt-10" action="{{ route('register') }}"  method="POST">
                                                @csrf
                                                <div class="wizard-form-step active" style=" height: 622px;">
                                                    <div class="grid lg:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4
                                                                class="text-base text-slate-800 dark:text-slate-300 my-6" align="center">
                                                                Nombre de la Iglesia</h4>
                                                        </div>
                                                        <div class="input-area">
                                                          <center>  <label for="username" class="form-label" >Ingrese el Nombre de la
                                                                Iglesia a la que pertence</label></center>
                                                            <input id="nombre" name="nombre" type="text"
                                                                class="form-control" placeholder="Nombre de Iglesia"
                                                                required>
                                                        </div>
                                                        <div class="input-area">
                                                            &nbsp;
                                                        </div>
                                                        <div class="input-area">
                                                            &nbsp;
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="mt-6 space-x-3" align="right">
                                                    <button class="btn btn-dark" type="submit">Siguiente</button>
                                                </div>

                                            </form>

                                            <!-- fin de formulario -->
                                        </div>
                                    </div>
                                    <!-- END: Step Form Horizontal -->

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




    <!-- scripts -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/rt-plugins.js"></script>
    <script src="assets/js/app.js"></script>








</body>

</html>
