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

        .tamano {
            font-size: 22px;

        }

        .content-input input[type=radio]+i:before {
            content: '';
            display: block;
            height: 18px;
            width: 18px;
            background: red;
            border-radius: 100%;
            position: absolute;
            z-index: 1;
            top: 4px;
            left: 4px;
            background: #2AC176;
            transition: all 0.25s ease;
            /* Todas las propiedades | tiempo | tipo movimiento */
            transform: scale(0)
                /* Lo reducimos a 0*/
            ;
            opacity: 0;
            /* Lo ocultamos*/
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
                                            <h4 class="card-title">form wizard</h4>
                                        </div>
                                        @php($contador = 1)
                                        <div class="card-body p-6">
                                            <div
                                                class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                                                <div class="  active pass  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step="1">
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
                                                @php($i = 2)
                                                @foreach ($questions as $obj)
                                                    <div class="  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                        data-step="2" id="div{{ $i }}">
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

                                                        </div>
                                                    </div>
                                                    @php($i++)
                                                    @php($num = $i)
                                                @endforeach

                                                <div class="  relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step={{ $num }}>
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{ $num }}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Formulario</span>
                                                    </div>
                                                </div>

                                                <div class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step={{ $num + 1 }}>
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{ $num + 1 }}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Redes sociales</span>
                                                    </div>
                                                </div>

                                                <div class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step={{ $num + 2 }}>
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{ $num + 2 }}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Logo</span>
                                                    </div>
                                                </div>
                                                <div class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step"
                                                    data-step={{ $num + 3 }}>
                                                    <div class="number-box">
                                                        <span class="number">
                                                            {{ $num + 3 }}
                                                        </span>
                                                        <span class="no-icon text-3xl">
                                                            <iconify-icon icon="bx:check-double"></iconify-icon>
                                                        </span>
                                                    </div>
                                                    <div class="bar-line"></div>
                                                    <div class="circle-box">
                                                        <span class="w-max">Guardar</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- inicio del form -->
                                            {{-- <form class="wizard-form mt-10" action="{{route('register')}}" method="POST">
                                                     @csrf --}}
                                            <form action="">

                                                <div class="wizard-form-step active" data-step="1">
                                                    <div class="input-area">
                                                        <br>
                                                        <label for="username" class="form-label tamano">
                                                            Nombre de iglesia</label>
                                                        <br>
                                                        <input id="nombre" name="nombre" type="text"
                                                            class="form-control">
                                                        <input id="departamento" name="departamento" type="hidden"
                                                            class="form-control">
                                                    </div>

                                                    <div id="div_result">


                                                    </div>


                                                </div>
                                                <div class="mt-6   space-x-3">

                                                    {{-- <button class="btn btn-dark next-button"
                                                        type="submit">submit</button> --}}
                                                </div>

                                            </form>
                                            <form action="">

                                                @php($j = 2)
                                                @foreach ($questions as $obj)
                                                    <div class="wizard-form-step" data-step="{{ $j }}">
                                                        <div
                                                            class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                            {{-- <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                <h4
                                                                    class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                    Set de Preguntas Generales</h4> </div>
                                                                    --}}

                                                        </div>

                                                        <div class="input-area">
                                                            <br>
                                                            <label for="questions"
                                                                class="form-label  tamano">{{ $obj->question }}</label>

                                                            <fieldset class="altura">
                                                                <div class="basicRadio tamano">
                                                                    <label>
                                                                        <label>
                                                                            <div class="primary-radio">
                                                                                <label
                                                                                    class="flex items-center cursor-pointer">
                                                                                    <input type="radio"
                                                                                        class="hidden" name="answer"
                                                                                        value="1"
                                                                                        checked="checked">
                                                                                    <span
                                                                                        class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                duration-150 h-[30px] w-[30px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                    <span
                                                                                        class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                </label>
                                                                            </div>
                                                                        </label>
                                                                        <br>

                                                                        <div class="primary-radio">
                                                                            <label
                                                                                class="flex items-center cursor-pointer">
                                                                                <input type="radio" class="hidden"
                                                                                    name="answer" value="0">
                                                                                <span
                                                                                    class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                duration-150 h-[30px] w-[30px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"
                                                                                    style="width: 300% height: 300%"></span>
                                                                                <span
                                                                                    class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                            </label>
                                                                        </div>
                                                                    </label>
                                                                    </label>
                                                                </div>
                                                            </fieldset>
                                                        </div>

                                                    </div>
                                                    @php($j++)
                                                    @php($numm = $j)
                                                @endforeach
                                                <div class="wizard-form-step" data-step="{{ $numm }}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4
                                                                class="text-base text-slate-800 dark:text-slate-300 my-6 tamano">
                                                                formulario</h4>
                                                        </div>
                                                        <div class="input-area lg:col-span-3 md:col-span-2 col-span-1">
                                                            <label for="address"
                                                                class="form-label tamano">formulario*</label>
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
                                                    </div>
                                                </div>
                                                <div class="wizard-form-step" data-step="{{ $numm + 1 }}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4
                                                                class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                Social Links</h4>
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="fblink" class="form-label tamano">Facebook
                                                                Link*</label>
                                                            <input id="fblink" type="url" class="form-control"
                                                                placeholder="Facebook Link">
                                                        </div>
                                                        <div class="input-area">
                                                            <label for="youtubelink" class="form-label tamano">Youtube
                                                                Link</label>
                                                            <input id="youtubelink" type="url"
                                                                class="form-control" placeholder="Youtube Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wizard-form-step" data-step="{{ $numm + 2 }}">
                                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
                                                        <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                            <h4
                                                                class="text-base text-slate-800 dark:text-slate-300 my-6 tamano">
                                                                <!-- fin de formulario -->
                                                                logo
                                                            </h4>
                                                            <form id="uploadForm"
                                                            enctype="multipart/form-data">
                                                            <input type="file" name="image"
                                                                id="imageInput">
                                                            <button type="submit">Subir Imagen</button>
                                                        </form>

                                                        <div id="destinationPath"></div>

                                                        </div>
                                                        <div class="wizard-form-step" data-step="{{ $numm + 3 }}"
                                                            id="div8">
                                                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5"
                                                                style="height: 700px">
                                                                <div class="lg:col-span-3 md:col-span-2 col-span-1">
                                                                    <h4
                                                                        class="text-base text-slate-800 dark:text-slate-300 my-6">
                                                                       Guardar Datos de Iglesia</h4>
                                                                </div>

                                                            <!--    <button class="btn btn-dark" type="button"
                                                                    onclick="myFunctionbackt0()">Anterior</button>

                                                                <button class="btn btn-dark" type="button">Siguiente</button>-->


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>

<!--
                                        @php($anterior = $num -1)
                                        @php($siguiente = $num +1)
                                        {{$anterior}}  {{$siguiente}}
                                          <div class="mt-6 space-x-3 text-right">

                                            <button class="btn btn-dark" type="button"
                                                onclick="myFunctionbackt({{ $anterior }})">Anterior</button>

                                            <button class="btn btn-dark" type="button"
                                                onclick="myFunctionnext({{ $siguiente  }})">Siguiente</button>


                                        </div>-->
                                           <div class="mt-6   space-x-3">
                                                    <button class="btn btn-dark prev-button"
                                                        type="button">prev</button>
                                                    <button class="btn btn-dark next-button"
                                                        type="button">next</button>
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
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
        });
    </script>

    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(e) {
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
        function myFunctionbackt(i) {
            alert(i);
            var num = Number(i);
            alert(num);
            var str = (num).toString()
            var divmostrar="div" + str;
           var divactivar="active" + str;

            document.getElementById("div" + str).style.display = 'block';
            document.getElementById(divactivar).classList.add('active');

        }

        function myFunctionnext(i) {
            alert(i);
            var num = Number(i);
            alert(num);
            var str = (num).toString()
            var divmostrar="div" + str;
           var divactivar="active" + str;
           alert(str);
            document.getElementById("div" + str).style.display = 'block';
            document.getElementById(divactivar).classList.add('active');



        }



        function myFunctionbackt0() {

document.getElementById("div1").style.display = 'block';

document.getElementById("active1").classList.add('active');


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
