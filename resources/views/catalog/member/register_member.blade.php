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

</head>

<body class=" font-inter skin-default">
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <main class="app-wrapper">
        <div class="flex flex-col justify-between min-h-screen">
            <div>
                <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]"
                    id="content_wrapper">
                    <div class="page-content">
                        <div class="transition-all duration-150 container-fluid" id="page_layout">
                            <div id="content_layout">


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
                                                                    <div class="card-title text-slate-900 dark:text-white"
                                                                        style="text-transform:none">
                                                                        Registro de nuevos participantes

                                                                    </div>
                                                                </div>

                                                                <a href="{{ URL('login') }}">
                                                                    <button class="btn btn-dark btn-sm float-right">
                                                                        <iconify-icon icon="icon-park-solid:back"
                                                                            style="color: white;" width="18">
                                                                        </iconify-icon>
                                                                    </button>
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

                                                            <form method="POST" action="{{ route('store_member') }}"
                                                                class="space-y-4">
                                                                @csrf
                                                                <div class="input-area relative">

                                                                    <input type="hidden" name="iglesia_id" required
                                                                        class="form-control"
                                                                        value=" {{ $iglesia->id }}">


                                                                </div>
                                                                <div
                                                                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Nombre </label>
                                                                        <input type="text" name="name"
                                                                            onblur="this.value = this.value.toUpperCase()"
                                                                            required class="form-control"
                                                                            value="{{ old('name') }}"
                                                                            autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Apellido</label>
                                                                        <input type="text" name="last_name"
                                                                            onblur="this.value = this.value.toUpperCase()"
                                                                            required class="form-control"
                                                                            value="{{ old('last_name') }}"
                                                                            autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput" class="form-label">Fecha
                                                                            nacimiento</label>
                                                                        <input type="date" id="birthdate"
                                                                            name="birthdate" required
                                                                            class="form-control"
                                                                            onblur="calcularEdad(this.value)"
                                                                            value="{{ old('birthdate') }}"
                                                                            autofocus="true">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Email</label>
                                                                        <input type="email" name="email" required
                                                                            class="form-control"
                                                                            value="{{ old('email') }}">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Password</label>
                                                                        <input type="password" name="password"
                                                                            required class="form-control">
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">ConfirmePassword</label>
                                                                        <input type="password"
                                                                            name="password_confirmation" required
                                                                            class="form-control">
                                                                    </div>


                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Número documento</label>
                                                                        <input type="text" name="document_number"
                                                                            id="document_number"
                                                                            data-inputmask="'mask': ['99999999-9']"
                                                                            class="form-control"
                                                                            value="{{ old('document_number') }}">
                                                                    </div>

                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Género</label>
                                                                        <select name="catalog_gender_id" class="form-control">
                                                                            @foreach ($generos as $obj)
                                                                                <option value="{{$obj->id}}" >{{$obj->description}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>


                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Telefono</label>
                                                                        <input type="text" name="phone_number"
                                                                            required class="form-control"
                                                                            data-inputmask="'mask': ['9999-9999']"
                                                                            value="{{ old('phone_number') }}">
                                                                    </div>




                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Departamento</label>
                                                                        <input type="text" name="state_id" required
                                                                            class="form-control"
                                                                            value="{{ $iglesia->departamento->nombre }}"
                                                                            disabled>
                                                                    </div>



                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Iglesia</label>
                                                                        <input type="text" name="iglesia" required
                                                                            class="form-control"
                                                                            value=" {{ $iglesia->name }}" disabled>


                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">grupo</label>
                                                                        <select id="grupo_id" name="grupo_id"
                                                                            class="form-control" required>
                                                                            @foreach ($grupos as $obj)
                                                                                <option value="{{ $obj->id }}">
                                                                                    {{ $obj->nombre }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>

                                                                    </div>


                                                                    <!--  <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Municipio</label>
                                                                        <select id="Municipio" name="Municipio"
                                                                            class="form-control select2">
                                                                            foreach ($municipios as $obj)
                                                                                <option value=" $obj->id }}"
                                                                                     old('Municipio') == $obj->id ? 'selected' : '' }}>
                                                                                     $obj->nombre }}
                                                                                </option>
                                                                            endforeach
                                                                        </select>
                                                                    </div>-->



                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Direccion</label>
                                                                        <textarea name="address" required class="form-control" rows="5">{{ old('address') }}</textarea>
                                                                    </div>
                                                                    <div class="input-area relative">
                                                                        <label for="largeInput"
                                                                            class="form-label">Acerca de mi</label>
                                                                        <textarea name="about_me" class="form-control" rows="5">{{ old('about_me') }}</textarea>
                                                                    </div>


                                                                </div>
                                                                <div style="text-align: right;">
                                                                    <button type="submit"
                                                                        class="btn inline-flex justify-center btn-dark">Aceptar</button>
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
    <!-- Core Js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
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

        function calcularEdad(fechaNacimiento) {
            var fechaNac = new Date(fechaNacimiento);
            var fechaActual = new Date();

            var edad = fechaActual.getFullYear() - fechaNac.getFullYear();
            var mes = fechaActual.getMonth() - fechaNac.getMonth();

            if (mes < 0 || (mes === 0 && fechaActual.getDate() < fechaNac.getDate())) {
                edad--;
            }

            if (edad >= 18) {
                $("#document_number").prop("required", true);
            } else {
                $("#document_number").prop("required", false);
            }

            @if ($grupo == 0)
                $.get('{{ url('/get_grupo') }}/' + fechaNacimiento, function(data) {
                    // Manejar la respuesta aquí
                    var _select = ''
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].id + '" >' + data[i].nombre +
                        '</option>';

                    $("#grupo_id").html(_select);
                });
            @endif


        }
    </script>

</body>

</html>
