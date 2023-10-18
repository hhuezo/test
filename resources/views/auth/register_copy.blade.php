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
                                            <h4 class="card-title">Registro de iglesia</h4>
                                        </div>

                                        <div class="card-body p-6">
                                            <div class="grid gap-5 grid-cols-12">
                                                <div class="lg:col-span-3 col-span-12">
                                                    <div class="flex z-[5] items-start relative flex-col lg:min-h-full md:min-h-[300px] min-h-[250px] wizard-steps">

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step active"
                                                            id="active1">
                                                            <div class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
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
                                                                <span class="w-max block">Datos de la iglesia</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active2">
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
                                                                <span class="w-max block">Numero de jovenes</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active3">
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
                                                                <span class="w-max block">Numero de mujeres </span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active4">
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
                                                                <span class="w-max block">Numero de Hombres</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active5">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 5</span>

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
                                                                <span class="w-max block">Numero de lideres</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active6">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 6</span>

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
                                                                <span class="w-max block">Formulario</span>
                                                            </div>
                                                        </div>


                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active7">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 7</span>

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
                                                                <span class="w-max block">pagina web / facebook</span>
                                                            </div>
                                                        </div>

                                                        <div class="relative z-[1] flex-1 last:flex-none wizard-step"
                                                            id="active8">
                                                            <div
                                                                class=" transition duration-150 icon-box md:h-12 md:w-12 h-8 w-8 rounded-full flex flex-col items-center justify-center relative z-[66] ring-1 md:text-lg text-base font-medium
                                                                bg-white ring-slate-900 ring-opacity-70  text-slate-900 dark:text-slate-300 text-opacity-70 dark:bg-slate-700 dark:ring-slate-700">
                                                                <div class="number-box">
                                                                    <span class="number"> 8</span>

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
                                                                <span class="w-max block">logo</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="conten-box lg:col-span-9 col-span-12 h-full">
                                                    <form>

                                                        <div class="wizard-form-step active" data-step="1"
                                                            id="div1">
                                                            <div
                                                                class="grid lg:grid-cols-12 md:grid-cols-1 grid-cols-1 gap-5">

                                                                <div class="input-area">
                                                                    <h4 class="card-title"> <label for="username"
                                                                            class="form-label">
                                                                            Nombre de iglesia</label></h4>
                                                                    <input id="nombre" name="nombre"
                                                                        type="text" class="form-control">
                                                                    <input id="departamento" name="departamento"
                                                                        type="hidden" class="form-control">
                                                                </div>





                                                                <div id="div_result">


                                                                </div>

                                                                <div class="mt-6 space-x-3 text-right">

                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext()">Siguiente</button>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="2"
                                                                id="div2">
                                                                <div class="input-area">
                                                                    <fieldset class="altura">
                                                                        <legend>¿A su iglesia pertenecen al menos 10
                                                                            jovenes
                                                                            entre 12 -18 años ?</legend>
                                                                        <div class="basicRadio">
                                                                            <label>
                                                                                <label>
                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupjuven"
                                                                                                value="Si"
                                                                                                checked="checked">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                                <label>

                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupjuven"
                                                                                                value="No">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="mt-6 space-x-3 text-right">
                                                                        <button class="btn btn-dark" type="button"
                                                                            onclick="myFunctionbackt6()">Anterior</button>
                                                                        <button class="btn btn-dark" type="button"
                                                                            onclick="myFunctionnext2()">Siguiente</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="3"
                                                                id="div3">
                                                                <div class="input-area">
                                                                    <fieldset class="altura">
                                                                        <legend>¿A su iglesia pertenecen al menos 5
                                                                            mujeres?
                                                                        </legend>
                                                                        <div class="basicRadio">
                                                                            <label>
                                                                                <label>
                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupwoman"
                                                                                                value="Si"
                                                                                                checked="checked">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                                <label>

                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupwoman"
                                                                                                value="No">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="mt-6 space-x-3 text-right">
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt5()">Anterior</button>
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext3()">Siguiente</button>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="4"
                                                                id="div4">
                                                                <div class="input-area">
                                                                    <fieldset class="altura">
                                                                        <legend> ¿A su iglesia pertenecen al menos 5
                                                                            hombres?
                                                                        </legend>
                                                                        <div class="basicRadio">
                                                                            <label>
                                                                                <label>
                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupman"
                                                                                                value="Si"
                                                                                                checked="checked">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                                <label>

                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupman"
                                                                                                value="No">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="mt-6 space-x-3 text-right">
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt4()">Anterior</button>
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext4()">Siguiente</button>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="5"
                                                                id="div5">
                                                                <div class="input-area">
                                                                    <fieldset fieldset class="altura">
                                                                        <legend> ¿Su iglesia cuenta con al menos 5
                                                                            lideres?
                                                                        </legend>
                                                                        <div class="basicRadio">
                                                                            <label>
                                                                                <label>
                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupleader"
                                                                                                value="Si"
                                                                                                checked="checked">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700" ></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                                <label>

                                                                                    <div class="primary-radio">
                                                                                        <label
                                                                                            class="flex items-center cursor-pointer">
                                                                                            <input type="radio"
                                                                                                class="hidden"
                                                                                                name="groupleader"
                                                                                                value="No">
                                                                                            <span
                                                                                                class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                    duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                            <span
                                                                                                class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </label>
                                                                            </label>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="mt-6 space-x-3 text-right">
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt3()">Anterior</button>
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext5()">Siguiente</button>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="6"
                                                                id="div6">
                                                                <div
                                                                    class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                                    <div
                                                                        class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                        <h4
                                                                            class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                            Personal Information</h4>
                                                                    </div>
                                                                    <div class="input-area">
                                                                        <label for="firstname"
                                                                            class="form-label">First
                                                                            Name*</label>
                                                                        <input id="firstname" type="text"
                                                                            class="form-control" placeholder="First">
                                                                    </div>
                                                                    <div class="input-area">
                                                                        <label for="lastname" class="form-label">Last
                                                                            Name*</label>
                                                                        <input id="lastname" type="text"
                                                                            class="form-control"
                                                                            placeholder="Last Name">
                                                                    </div>
                                                                </div>
                                                                <!--</div>                                                        <div class="wizard-form-step" data-step="">-->

                                                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5"
                                                                    style="height: 700px">
                                                                    <div
                                                                        class="lg:col-span-3 md:col-span-2 col-span-1">
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
                                                                <div class="mt-6 space-x-3 text-right">
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt2()">Anterior</button>
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext6()">Siguiente</button>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="7"
                                                                id="div7">
                                                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5"
                                                                    style="height: 700px">
                                                                    <div
                                                                        class="lg:col-span-3 md:col-span-2 col-span-1">

                                                                        Social Links
                                                                    </div>
                                                                    <h4 class="card-title">
                                                                        <div class="input-area">
                                                                            <label for="fblink"
                                                                                class="form-label">Facebook
                                                                                Link*</label>
                                                                            <input id="fblink" type="url"
                                                                                class="form-control"
                                                                                placeholder="Facebook Link">
                                                                        </div>
                                                                    </h4>
                                                                    <h4 class="card-title">
                                                                        <div class="input-area">
                                                                            <label for="youtubelink"
                                                                                class="form-label">Youtube
                                                                                Link*</label>
                                                                            <input id="youtubelink" type="url"
                                                                                class="form-control"
                                                                                placeholder="Youtube Link">
                                                                        </div>
                                                                    </h4>
                                                                </div>
                                                                <div class="mt-6 space-x-3 text-right">
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt1()">Anterior</button>
                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext7()">Siguiente</button>
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <h4 class="card-title">
                                                            <div class="wizard-form-step" data-step="8"
                                                                id="div8">
                                                                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5"
                                                                    style="height: 700px">
                                                                    <div
                                                                        class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                        <h4
                                                                            class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                            Logo</h4>
                                                                    </div>
                                                                    <form id="uploadForm"
                                                                        enctype="multipart/form-data">
                                                                        <input type="file" name="image"
                                                                            id="imageInput">
                                                                        <button type="submit">Subir Imagen</button>
                                                                    </form>

                                                                    <div id="destinationPath"></div>



                                                                </div>
                                                                <div class="mt-6 space-x-3 text-right">

                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionbackt0()">Anterior</button>

                                                                    <button class="btn btn-dark" type="button"
                                                                        onclick="myFunctionnext8()">Siguiente</button>


                                                                </div>
                                                            </div>
                                                        </h4>
                                                </div>
                                                {{-- <div class="mt-6 space-x-3 text-right">
                                                            <button class="btn btn-dark prev-button" type="button"
                                                                style="display: none;">prev</button>
                                                            <button class="btn btn-dark next-button"
                                                                type="button">Siguiente</button>
                                                        </div> --}}
                                                <script>
                                                    function myFunction() {
                                                        location.replace("https://www.w3schools.com")
                                                    }
                                                </script>

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
    document.getElementById('uploadForm').addEventListener('submit', function (e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('/images', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Imagen subida con éxito');
        } else {
            alert('Error al subir la imagen');
        }
    })
    .catch(error => {
        alert('Error en la solicitud');
    });
});

    </script>


    <script>
        function myFunctionbackt0() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'block';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.add('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }

        function myFunctionbackt1() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'block';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }


        function myFunctionbackt2() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'block';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.add('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt3() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.add('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt4() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.add('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt5() {


            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'block';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active2").classList.add('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionbackt6() {


            document.getElementById("div1").style.display = 'block';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active1").classList.add('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');


        }

        function myFunctionnext() {

            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'block';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active2").classList.add('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
            // var x = document.getElementById("div1");
            // if (x.style.display === "none") {
            //     x.style.display = "block";
            // } else {
            //     x.style.display = "none";

            // }
            // var y= document.getElementById("div2");
            // if (y.style.display === "none") {
            //     y.style.display = "block";
            // } else {
            //     y.style.display = "none";

            // }


        }

        function myFunctionnext2() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'block';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active3").classList.add('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext3() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'block';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active4").classList.add('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active1").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext4() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'block';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active5").classList.add('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext5() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'block';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active6").classList.add('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext6() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'block';
            document.getElementById("div8").style.display = 'none';
            document.getElementById("active7").classList.add('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active8").classList.remove('active');
        }

        function myFunctionnext7() {
            document.getElementById("div1").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div8").style.display = 'block';
            document.getElementById("active8").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active").classList.remove('active');
        }

        function myFunctionnext8() {
            document.getElementById("div7").style.display = 'none';
            document.getElementById("div2").style.display = 'none';
            document.getElementById("div3").style.display = 'none';
            document.getElementById("div4").style.display = 'none';
            document.getElementById("div5").style.display = 'none';
            document.getElementById("div6").style.display = 'none';
            document.getElementById("div8").style.display = 'block';
            document.getElementById("active8").classList.add('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active7").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active5").classList.remove('active');
            document.getElementById("active").classList.remove('active');
            document.getElementById("active2").classList.remove('active');
            document.getElementById("active4").classList.remove('active');
            document.getElementById("active3").classList.remove('active');
            document.getElementById("active6").classList.remove('active');
            document.getElementById("active").classList.remove('active');
        }
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
