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
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->

    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }

        .altura {
            height: 600px;
        }

        input[type=radio] {
            height: 30px;
            width: 30px;
            border-radius: 100%;
            left: 15px;
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
                                            <h4 class="card-title">Registro de Iglesia</h4>
                                        </div>
                                        <div class="card-body p-6">
                                            <!-- inicio de step -->
                                            <div
                                                class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                                                <div class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step passed"
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
                                                @php($i = 2)
                                                @foreach ($questions as $obj)
                                                    <div class="relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step active"
                                                        data-step="{{ $i }}" id="div{{ $i }}">
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
                                                    data-step="{{ $num }}" id="div{{ $num }}">
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
                                                        <span class="w-max"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- fin of step -->
                                            <!-- inicio del form -->

                                            <form action="{{ url('iglesia_actualizar') }}" class="wizard-form mt-10"
                                                method="post">
                                                <input type="hidden" name="id" value="{{ $iglesia->id }}">
                                                <div>
                                                    <div class="grid lg:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-5">

                                                        <div class="input-area">
                                                            <label class="form-label">Departamento</label>
                                                            <input id="departamento" type="hidden" class="form-control"
                                                                required>

                                                            <input id="departamento_show" type="text"
                                                                class="form-control" readonly>
                                                        </div>


                                                        <div class="input-area">
                                                            <label for="fullname" class="form-label">Seleccione en el
                                                                mapa</label>
                                                            <div id="div_result">



                                                            </div>
                                                        </div>
                                                        <div class="input-area">
                                                            &nbsp;
                                                        </div>
                                                        <div class="input-area">
                                                            &nbsp;
                                                        </div>
                                                    </div>

                                                </div>



                                                <div class="mt-6 space-x-3">
                                                    <button class="btn btn-dark" type="button">prev</button>
                                                    <button class="btn btn-dark" type="button">next</button>
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
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
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
