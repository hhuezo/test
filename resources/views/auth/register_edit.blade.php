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
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>


    <style>
        .card-title,
        .form-label {
            text-transform: none;
        }

        .black_logo {
            width: 120px;
        }

        img {
            max-width: 225px;
            max-height: 225px;
            /* This ensures that the aspect ratio is maintained */
        }

        #calendar {
            max-width: 600px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            cursor: pointer;
        }


        .date_disabled {
            background-color: #f2f2f2;
            color: rgb(8, 0, 0);
        }

        .nav-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .nav-buttons button {
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>


    <!-- END : Theme Config js-->
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
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

        .form {
            height: 622px;
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
                                            <div class="wizard-steps flex z-[5] items-center relative justify-center md:mx-8">

                                                @for ($i = 1; $i <= count($questions) + 3; $i++) <div class="{{ $i == session('tab') ? 'active pass' : '' }} relative z-[1] items-center item flex flex-start flex-1 last:flex-none group wizard-step {{ $i < session('tab') ? 'passed' : '' }}">
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
                                        @if (session('tab') == 2)
                                        <div>
                                            <form id="form_departamento" action="{{ url('iglesia_actualizar') }}" class="wizard-form mt-10" method="post">
                                                <div class="form">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $iglesia->id }}">

                                                    <div class="grid lg:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-5">

                                                        <label class="form-label" align="center">Nombre de la Iglesia</label>
                                                        <div class="input-area">
                                                            <input id="nombre" name="nombre" value="{{ $iglesia->name }}" class="form-control" readonly>
                                                        </div>

                                                        <div class="input-area">
                                                            <label class="form-label" align="center">Departamento</label>
                                                            <input id="departamento" type="hidden" value="{{ $departamento ? $departamento->id : '' }}" name="departamento" class="form-control" required>

                                                            <input id="departamento_abbrev" type="hidden" value="{{ $departamento ? $departamento->abbrev : '' }}" class="form-control" required>

                                                            <input id="departamento_show" type="text" value="{{ $departamento ? $departamento->nombre : '' }}" class="form-control" readonly>
                                                        </div>


                                                        <div class="input-area">
                                                            <label for="fullname" class="form-label" align="center">Seleccione
                                                                en el mapa el Departamento en la que esta ubicado su Iglesia</label>
                                                            <div id="div_result" >

                                                            </div>
                                                            <div> <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div> <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></div>
                                                <div> <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p></div>
                                                <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">

                                                    <button class="btn inline-flex justify-center text-white bg-black-500" type="button" onclick="validar_departamento()">Siguiente</button>
                                                </div>
                                            </form>
                                            <script>
                                                function validar_departamento() {
                                                    if (document.getElementById('departamento').value.trim() == '') {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Oops...',
                                                            text: 'El departamento es requerido'
                                                        })
                                                        return false;
                                                    }

                                                    $('#form_departamento').submit();
                                                }
                                            </script>
                                        </div>
                                        @endif

                                        @if (session('tab') > 2 && session('tab') < count($questions) + 3) <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
                                            <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                            <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            </p>
                                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <div>
                                        <div class="wizard-steps   relative md:mx-8">
                                            <div class="card-title" style="display:{{ session('tab') < 3 ? 'none' : 'block' }}">
                                                <form action="{{ url('iglesia/registro_respuesta') }}" class="wizard-form mt-10" method="post">
                                                    @csrf
                                                    <div class="form ">
                                                        <input type="hidden" name="iglesia_id" value="{{ $iglesia->id }}">
                                                        @php($i = 3)
                                                        @foreach ($questions as $obj)
                                                        @if (session('tab') == $i)
                                                        <div class="input-area " align="center">
                                                            {{ $obj->question }}

                                                            <input type="hidden" name="question_id" value="{{ $obj->id }}">
                                                            <legend>{{ $obj->nombre }}</legend>
                                                            <br>
                                                            <div class="card-text h-full space-y-4">
                                                                <div class="flex items-center space-x-7 flex-wrap    items-center justify-center">
                                                                    <div class="basicRadio">
                                                                        <label class="flex items-center cursor-pointer">
                                                                            <input type="radio" class="hidden" name="answer" value="1" {{ $obj->answer == 1 ? 'checked' : '' }}>
                                                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                        duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                            <span class="text-secondary-500 text-sm leading-6 capitalize">
                                                                                Si</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="basicRadio">
                                                                        <label class="flex items-center cursor-pointer">
                                                                            <input type="radio" class="hidden" name="answer" {{ $obj->answer == 0 ? 'checked' : '' }} value="0">
                                                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                            duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                            <span class="text-secondary-500 text-sm leading-6 capitalize">No</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        @endif
                                                        @php($i++)
                                                        @endforeach
                                                        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </p>
                                                        <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                                        <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                                        <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                                        <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                                                        <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>







                                                        <div class="mt-6 space-x-3 text-right">
                                                            <a href="{{ url('iglesia/back_page') }}">
                                                                <button class="btn btn-secondary" type="button">Anterior</button>
                                                            </a>
                                                            <button class="btn btn-dark" type="submit">Siguiente</button>
                                                        </div>
                                                    </div>

                                                    <!--aqui estaba los butones-->

                                                </form>
                                            </div>
                                        </div>
                                        @endif

                                        @if (session('tab') == count($questions) + 3)
                                        <div class="card-text h-full " style="display:{{ session('tab') < 3 ? 'none' : 'block' }}">
                                            @if (count($errors) > 0)
                                            <br>
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <form action="{{ url('iglesia/registro_iglesia') }}" enctype="multipart/form-data" class="wizard-form mt-10" method="post">
                                                @csrf
                                                <div class="form">
                                                    <input type="hidden" name="iglesia_id" value="{{ $iglesia->id }}">

                                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                        <div class="input-area relative">
                                                            <label class="form-label">Nombre de Contacto</label>
                                                            <input id="firstname" name="name" value="{{ old('name') }}" type="text" class="form-control" autofocus required>
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label class="form-label">Correo de Contacto</label>
                                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label class="form-label">Nombre de Pastor</label>
                                                            <input id="firstname" name="pastor_name" value="{{ old('pastor_name') }}" type="text" class="form-control" autofocus required>
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label class="form-label">Teléfono de Pastor</label>
                                                            <input type="text" name="pastor_phone_number" id="pastor_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" placeholder="9999-99999"  value="{{ old('pastor_phone_number') }}"  >
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label class="form-label">Contraseña</label>
                                                            <input type="password" name="password" class="form-control" required>
                                                        </div>
                                                        <div class="input-area relative">
                                                            <label class="form-label">Confirmar
                                                                contraseña</label>
                                                            <input type="password" name="password_confirmation" class="form-control" required>
                                                        </div>


                                                        <div class="input-area">
                                                            <label for="lastname" class="form-label">Facebook Link</label>
                                                            <input name="facebook" type="text" value="{{ old('facebook') }}" class="form-control">
                                                        </div>

                                                        <div class="input-area">
                                                            <label for="lastname" class="form-label">Sitio Web Link</label>
                                                            <input name="website" type="text" value="{{ old('website') }}" class="form-control">
                                                        </div>

                                                        <div class="input-area relative">
                                                            <label for="address" class="form-label">Dirección</label>
                                                            <textarea name="address" class="form-control" required rows="5">{{ old('address') }}</textarea>
                                                        </div>

                                                        <div class="input-area relative" id="FotoUrl">
                                                            <label for="Telefono" class="form-label">Logo</label>
                                                            <!-- <input type="file" name="logo" id="logo" class="form-control"> -->



                                                            <input type="file" name="logo" id="fileInput" style="display: none;">
                                                            <div id="avatar" name="avatar" class="dropzone"> </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                &nbsp; &nbsp; &nbsp;
                                                <div class="mt-6 space-x-3 text-right">
                                                    <a href="{{ url('iglesia/back_page') }}">
                                                        <button class="btn btn-secondary" type="button">Anterior</button>
                                                    </a>
                                                    <button class="btn btn-dark" type="submit">Siguiente</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif




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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script type="text/javascript">
        // Configura Dropzone para el campo de entrada 'avatar'
        const avatarDropzone = new Dropzone('#avatar', {
            url: "{{ route('dropzone.store') }}", // Ruta de carga de avatar en Laravel
            paramName: 'avatar', // Nombre del campo que Laravel espera
            maxFilesize: 2, // Tamaño máximo de archivo en MB
            acceptedFiles: 'image/*', // Permitir cualquier tipo de archivo
            addRemoveLinks: true, // Mostrar el botón para quitar el archivo
            dictRemoveFile: "<br><button class='btn btn-danger'>Remover</button>", // Texto del botón para quitar el archivo
            dictDefaultMessage: "Arrastra aquí o haz clic para subir tu logo", // Cambia el título por defecto
            maxFile: 1,
        });

        document.getElementById('avatar').addEventListener('click', function() {
            // Simula un clic en el input para abrir el selector de archivos
            // document.getElementById('fileInput').click();
            //   console.log(document.getElementById('avatar'));
        });


        document.getElementById('fileInput').addEventListener('change', function() {
            // Puedes realizar acciones adicionales aquí, como mostrar información sobre los archivos seleccionados
            console.log('Archivos seleccionados:', this.files);
        });

        avatarDropzone.on('addedfile', function(file) {
            // Muestra información sobre el archivo en la consola
            console.log('Archivo agregado:', file);

            // Crea un objeto DataTransfer y agrega el archivo
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);

            // Asigna el objeto DataTransfer al input oculto
            var fileInput = document.getElementById('fileInput');
            fileInput.files = dataTransfer.files;

        });

        avatarDropzone.on('removedfile', function(file) {
            // Muestra información sobre el archivo en la consola
            console.log('Archivo eliminado:', file);
            document.getElementById('fileInput').value = null;


        });



        document.getElementById('avatar').addEventListener('dragover', function(e) {
            e.preventDefault(); // Evita el comportamiento predeterminado de arrastrar y soltar
            this.style.backgroundColor = '#f0f0f0'; // Cambia el fondo para indicar que se puede soltar
        });

        document.getElementById('avatar').addEventListener('dragleave', function() {
            this.style.backgroundColor = ''; // Restaura el fondo al salir del área de soltar
        });


        document.getElementById('avatar').addEventListener('drop', function(e) {
            e.preventDefault(); // Evita el comportamiento predeterminado de arrastrar y soltar
            this.style.backgroundColor = ''; // Restaura el fondo

            var files = e.dataTransfer.files; // Obtiene los archivos arrastrados
            if (files.length > 0) {
                // Asigna los archivos seleccionados al input oculto
                document.getElementById('fileInput').files = files;
            }
        });
    </script>
    <script>
        jQuery(function($){

             $("#pastor_phone_number").mask("9999-9999");

        });
        </script>
    <script>
        google.charts.load('current', {
            'packages': ['geochart']
        });

        $(document).ready(function() {
            if (document.getElementById('departamento_abbrev').value != '') {
                get_map(document.getElementById('departamento_abbrev').value); //
            } else {
                get_map('A');
            }
           // $('#pastor_phone_number').inputmask('9999-9999');
           $('#pastor_phone_number').mask('9999-9999');
        });


        function get_map(dep) {
            $.ajax({
                url: "{{ url('get_map') }}/" + dep,
                type: "GET",
                success: function(data) {
                    $("#div_result").html(data);
                },
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                }
            });
        }
    </script>
</body>

</html>
