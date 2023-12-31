<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Urban</title>
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
    <link rel="stylesheet" href="{{ asset('assets/css/general_colors.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('assets/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->

</head>

<style>
    .card-title {
        text-transform: none;
    }
</style>

<body class="skin-default">
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div>

        <!-- END: Header -->
        <!-- END: Header -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px]" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">
                        {{-- @yield('contenido') --}}


                        <div class="page-content">
                            <div class="transition-all duration-150 container-fluid" id="page_layout">
                                <div id="content_layout">

                                    <div class="grid grid-cols-12 gap-6 mb-6" style="margin-left: 10%;">

                                        <div class="2xl:col-span-6 lg:col-span-8 col-span-12">
                                            <div class="card">
                                                <div class="card-body p-6">
                                                    <header
                                                        class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                                        <div class="flex-1">
                                                            <div class="card-title text-slate-900 dark:text-white">
                                                                <h4> Registro</h4>
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
                                                        </div>
                                                        <div
                                                            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                            <div class="input-area relative">
                                                                <label for="largeInput" class="form-label">Nombre
                                                                </label>
                                                                <input type="text" name="name"
                                                                    onblur="this.value = this.value.toUpperCase()"
                                                                    required class="form-control"
                                                                    value="{{ old('name') }}" autofocus="true">
                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Apellido</label>
                                                                <input type="text" name="last_name"
                                                                    onblur="this.value = this.value.toUpperCase()"
                                                                    required class="form-control"
                                                                    value="{{ old('last_name') }}" autofocus="true">
                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput" class="form-label">Fecha
                                                                    nacimiento</label>
                                                                <input type="date" id="birthdate" name="birthdate"
                                                                    required class="form-control"
                                                                    onblur="calcularEdad(this.value)"
                                                                    value="{{ old('birthdate') }}" autofocus="true">
                                                            </div>
                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Genero</label>
                                                                <select name="genero" class="form-control" required>
                                                                    @foreach ($generos as $obj)
                                                                        <option value="{{ $obj->id }}">
                                                                            {{ $obj->description }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput" class="form-label">Email</label>
                                                                <input type="email" name="email" required
                                                                    class="form-control" value="{{ old('email') }}">
                                                            </div>
                                                            <div class="input-area relative">
                                                                <label for="largeInput" class="form-label">Número
                                                                    documento</label>
                                                                <input type="text" name="document_number"
                                                                    id="document_number"
                                                                    data-inputmask="'mask': ['99999999-9']"
                                                                    class="form-control"
                                                                    value="{{ old('document_number') }}">
                                                            </div>
                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Password</label>
                                                                <input type="password" name="password" required
                                                                    class="form-control">
                                                            </div>
                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">ConfirmePassword</label>
                                                                <input type="password" name="password_confirmation"
                                                                    required class="form-control">
                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Telefono</label>
                                                                <input type="text" name="phone_number" required
                                                                    class="form-control"
                                                                    data-inputmask="'mask': ['9999-9999']"
                                                                    value="{{ old('phone_number') }}">
                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Iglesia</label>
                                                                <select id="iglesia_id" name="iglesia_id"
                                                                    class="form-control" required>
                                                                    @foreach ($iglesias as $obj)
                                                                        <option value="{{ $obj->id }}" {{old('iglesia_id') == $obj->id ? 'selected':''}}>
                                                                            {{ $obj->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>


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

                                                            <div class="input-area relative">
                                                                &nbsp;

                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Departamento</label>
                                                                <select id="departamento_id" name="departamento_id"
                                                                    class="form-control" required>
                                                                    @foreach ($departamentos as $obj)
                                                                        <option value="{{ $obj->id }}">
                                                                            {{ $obj->nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Municipio</label>
                                                                <select id="municipio_id" name="municipio_id"
                                                                    class="form-control" required>
                                                                    @foreach ($municipios as $obj)
                                                                        <option value="{{ $obj->id }}">
                                                                            {{ $obj->nombre }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>

                                                            <div class="input-area relative">
                                                                <label for="largeInput"
                                                                    class="form-label">Dirección</label>
                                                                <textarea name="address" required class="form-control" rows="5">{{ old('address') }}</textarea>
                                                            </div>
                                                            <div class="input-area relative">
                                                                <label for="largeInput" class="form-label">Acerca de
                                                                    mi</label>
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
            //$("#departamento_id").change();
            $("#departamento_id").change(function() {
                //alert('holi');
                // var para la Departamento
                var Departamento = $(this).val();

                $.get("{{ url('get_municipio/') }}" + '/' + Departamento, function(data) {

                    console.log(data);
                    var _select = ''
                    for (var i = 0; i < data.length; i++)
                        _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                        '</option>';

                    $("#municipio_id").html(_select);

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

            $.get("{{url('/get_grupo')}}/" + fechaNacimiento, function(data) {
                // Manejar la respuesta aquí
                var _select = ''
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                    '</option>';

                $("#grupo_id").html(_select);
            });

        }
    </script>

</body>

</html>
