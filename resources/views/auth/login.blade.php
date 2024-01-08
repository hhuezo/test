@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/rt-plugins.css">
<link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<!-- START : Theme Config js-->
<script src="{{ asset('assets/js/settings.js') }}" sync></script>
<!-- END : Theme Config js-->
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
<div class="loginwrapper bg-cover bg-no-repeat bg-center" style="background-image: url(img/otro2_dashboard.jpg);">
    <div class="lg-inner-column">
        <div class="left-columns lg:w-1/2 lg:block hidden">
            <div class="logo-box-3">
                <a heref="index.html" class="">
                </a>
            </div>
        </div>
        <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">

            <div class="lg:w-1/2 w-full flex flex-col items-center justify-center">
                <div class="auth-box-3">

                    <div class="text-center 2xl:mb-10 mb-5">
                        <h4 class="font-medium">Iniciar sesión</h4>
                        {{-- <div class="text-slate-500 dark:text-slate-400 text-base">
                            Inicie sesión con su cuenta
                        </div> --}}
                    </div>
                    <!-- BEGIN: Login Form -->
                    <form class="space-y-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="text-center">
                                <label for="email" class="col-md-4 col-form-label text-md-end"><strong>Tipo de inicio de

                                    sesión</strong></label>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <table border="1" width="80%" style="margin-left: 10%;">
                                <tr>
                                    <td align="center" onclick="tipo_sesion(1)" style="color:#0F172A;" id="label-email">
                                        <iconify-icon icon="mdi:email-minus-outline" width="50" id="icon-email"></iconify-icon><br><small>Correo Electronico</small>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td align="center" onclick="tipo_sesion(2)" style="color: lightgray;" id="label-telefono"><iconify-icon icon="akar-icons:phone" width="50" id="icon-telefono"></iconify-icon><br><small>Numero Telefono</small></td>
                                    <td>&nbsp;</td>
                                    <td align="center" onclick="tipo_sesion(3)" style="color: lightgray;" id="label-documento"><iconify-icon icon="solar:user-id-broken" width="50" id="icon-documento"></iconify-icon><br><small>Numero Documento</small></td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <br>
                    <div class="fromGroup" id="correo" style="display: block;">
                        <label class="block capitalize form-label"><iconify-icon icon="mdi:email-minus-outline"></iconify-icon> Correo electrónico</label>
                        <div class="relative ">
                            <input type="email" name="email" id="email" class="form-control py-2" required autocomplete>
                        </div>
                    </div>
                    <div class="fromGroup" id="telefono" style="display: none;">
                        <label class="block capitalize form-label"><iconify-icon icon="akar-icons:phone"></iconify-icon>
                            Teléfono</label>
                        <div class="relative ">
                            <input type="text" name="phone" id="phone" class="form-control py-2 " autocomplete data-inputmask="'mask': ['9999-9999']">

                        </div>
                    </div>
                    <div class="fromGroup" id="documento" style="display: none;">
                        <label class="block capitalize form-label"> <iconify-icon icon="solar:user-id-broken"></iconify-icon> Número de DUI</label>
                        <div class="relative ">
                            <input type="text" name="document_number" id="document_number" class="form-control py-2" autocomplete data-inputmask="'mask': ['99999999-9']">

                        </div>
                    </div>
                    <div class="fromGroup" id="contra" style="display: block;">
                        <label class="block capitalize form-label">Contraseña</label>
                        <div class="relative ">
                            <input type="password" id="password" name="password" class="form-control py-2   @error('password') is-invalid @enderror" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <label class="flex items-center cursor-pointer">
                        </label>
                        <a class="text-sm text-slate-800 dark:text-slate-400 leading-6 font-medium" href="{{ route('password.request') }}">Forgot Password? </a>
                    </div>

                    @if (count($errors) > 0)
                    <br>
                    <div class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                        <div class="flex items-start space-x-3 rtl:space-x-reverse">
                            <div class="flex-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <button class="btn btn-dark block w-full text-center" id="btn-inicio" style="display: block;">Iniciar sesión</button>
                </form>
                <!-- END: Login Form -->
                <div class=" relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                    <div class=" absolute inline-block bg-white dark:bg-slate-800 dark:text-slate-400 left-1/2 top-1/2 transform -translate-x-1/2
                                px-4 min-w-max text-sm text-slate-500 dark:text-slate-400font-normal ">
                        O {{-- Or continue with --}}
                    </div>
                </div>

                <div class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">

                    <a class="btn btn-secondary block w-full text-center" href="{{ url('register_member') }}">
                        Registro participante</a>
                </div>

                <div class="mx-auto font-normal text-slate-500 dark:text-slate-400 2xl:mt-12 mt-6 uppercase text-sm text-center">
                    {{-- Already registered? --}}

                    <a class="btn btn-secondary block w-full text-center" href="{{ url('/registrar') }}"> Registro
                        Iglesia</a>

                </div>
            </div>
        </div>

    </div>
</div>
<!-- Core Js -->


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<script type="text/javascript">
    function tipo_sesion(id) {
        if (id == 2) { //telefono
            $("#telefono").show();
            document.getElementById('phone').setAttribute('required', true);
            $("#correo").hide();
            document.getElementById('email').removeAttribute('required');
            $("#documento").hide();
            document.getElementById('document_number').removeAttribute('required');

            document.getElementById('label-email').style.color = 'lightgray';
            document.getElementById('icon-email').style.color = 'lightgray';
            document.getElementById('label-telefono').style.color = '#0F172A';
            document.getElementById('icon-telefono').style.color = '#0F172A';
            document.getElementById('label-documento').style.color = 'lightgray';
            document.getElementById('icon-documento').style.color = 'lightgray';
            document.getElementById('email').value = '';
            document.getElementById('document_number').value = '';

        } else if (id == 3) { // dui
            $("#telefono").hide();
            document.getElementById('phone').removeAttribute('required');
            $("#correo").hide();
            document.getElementById('email').removeAttribute('required');
            $("#documento").show();
            document.getElementById('document_number').setAttribute('required', true);
            document.getElementById('label-email').style.color = 'lightgray';
            document.getElementById('icon-email').style.color = 'lightgray';
            document.getElementById('label-telefono').style.color = 'lightgray';
            document.getElementById('icon-telefono').style.color = 'lightgray';
            document.getElementById('label-documento').style.color = '#0F172A';
            document.getElementById('icon-documento').style.color = '#0F172A';
            document.getElementById('email').value = '';
            document.getElementById('phone').value = '';
        } else if (id == 1) { //email
            $("#telefono").hide();
            document.getElementById('phone').removeAttribute('required');
            $("#correo").show();
            document.getElementById('email').setAttribute('required', true);
            $("#documento").hide();
            document.getElementById('document_number').removeAttribute('required');
            document.getElementById('label-email').style.color = '#0F172A';
            document.getElementById('icon-email').style.color = '#0F172A';
            document.getElementById('label-telefono').style.color = 'lightgray';
            document.getElementById('icon-telefono').style.color = 'lightgray';
            document.getElementById('label-documento').style.color = 'lightgray';
            document.getElementById('icon-documento').style.color = 'lightgray';
            document.getElementById('document_number').value = '';
            document.getElementById('phone').value = '';
        }

        $("#contra").show();
        $("#btn-inicio").show();
    }



    function participante_link() {
        //   alert('');
        // Swal.fire('El Nuevo participante debe registrarse con el link enviado de su iglesia');
        Swal.fire({
            title: 'Error!',
            text: 'El Nuevo participante debe registrarse con el link enviado de su iglesia',
            icon: 'error',
            ///  timer: '3600',
            confirmButtonText: 'OK'
        })
    }
</script>
@endsection
