@extends ('menu')
@section('contenido')
    @livewireStyles
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <div class="flex flex-col justify-between min-h-screen">
        <div>

            <div class=" md:flex justify-between items-center">
                <div>
                </div>
                <div class="flex flex-wrap ">


                    <button id="btn-cancelar" style="display: none"
                        class="btn inline-flex justify-center btn-outline-info dark:bg-slate-700 dark:text-slate-300 m-1"
                        onclick="hide_add_sesion()">
                        <span class="flex items-center">
                            <span>Cancelar</span>
                        </span>
                    </button>
                    <button id="btn-agregar"
                        class="btn inline-flex justify-center btn-outline-info dark:bg-slate-700 dark:text-slate-300 m-1"
                        onclick="show_add_sesion()">
                        <span class="flex items-center">
                            <span>Agregar sesión</span>
                        </span>
                    </button>

                    <a href="{{ url('administracion/iglesia_plan_estudio') }}"
                    class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1">

                    <iconify-icon icon="eva:undo-fill" style="color: white;" width="22"></iconify-icon>
                </a>

                </div>
            </div>



            <div class="content-wrapper transition-all duration-150" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid">
                        <div id="sesion_layout" style="display: none;">
                            @livewire('add-sesion', ['plan_id' => $plan->id])
                        </div>
                        <div id="card_sesion_layout">
                            <div class="space-y-5 profile-page">
                                <div class="grid grid-cols-12 gap-6">

                                    <div class="lg:col-span-4 col-span-12">
                                        <div class="card h-full">
                                            <header class="card-header">
                                                <h4 class="card-title">{{ $plan->name }}</h4>
                                            </header>
                                            <div class="card-body p-6">
                                                <ul class="list space-y-8">

                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:home-modern"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Iglesia
                                                            </div>
                                                            <p class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->name }}
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <!-- end single list -->
                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:user-group"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Grupo
                                                            </div>
                                                            <p class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->grupo->nombre }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <!-- end single list -->




                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:map"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Plan de estudio
                                                            </div>
                                                            <div class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->plan_estudio->description_es }}
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Fecha inicio
                                                            </div>
                                                            <p class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->start_date ? date('d/m/Y', strtotime($plan->start_date)) : '' }}
                                                            </p>
                                                        </div>
                                                    </li>

                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Fecha final
                                                            </div>
                                                            <p class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->end_date ? date('d/m/Y', strtotime($plan->end_date)) : '' }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <!-- end single list -->
                                                </ul>

                                            </div>
                                            <header class="card-header">
                                                <h4 class="card-title">Participantes</h4>
                                            </header>

                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table
                                                        class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">

                                                        <tbody
                                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                            @foreach ($participantes as $participante)
                                                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                    <td class="table-td">
                                                                        <li style="list-style: none;"> <iconify-icon
                                                                                icon="material-symbols:label-important-sharp"></iconify-icon>
                                                                            {{ $participante->nombre }}</li>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-8 col-span-12">
                                        <div class="card" id="card-sesion">

                                            <header class="card-header">
                                                <strong>Sesiones</strong>
                                                <a href="{{ asset('plantilla_asistencia.xlsx') }}"
                                                    class="btn ml-auto btn-outline-success btn-sm"> <iconify-icon
                                                        icon="material-symbols-light:download-sharp" width="13"
                                                        style="vertical-align: middle;"></iconify-icon> Download
                                                    Plantilla</a>
                                            </header>

                                        </div>
                                        <br>
                                        <div id="datos_generales">


                                            <div class="grid xl:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-5">
                                                @foreach ($sesiones as $sesion)
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="card-text h-full">
                                                                <header
                                                                    class="border-b px-4 pt-4 pb-3 flex items-center border-info-500">
                                                                    <iconify-icon
                                                                        class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-info-500"
                                                                        icon="ph:info"></iconify-icon>
                                                                    <h3 class="card-title mb-0 text-info-500">
                                                                        {{ $sesion->session_name }}
                                                                    </h3>

                                                                    <button class="ml-auto btn-outline-dark btn btn-sm"
                                                                        id="btn_delete" data-bs-toggle="modal"
                                                                        data-bs-target="#modal-delete-{{ $sesion->id }}">
                                                                        <iconify-icon icon="ic:baseline-delete"
                                                                            style="color: black;"
                                                                            width="20"></iconify-icon>
                                                                    </button>

                                                                    <button class="ml-auto btn-dark btn btn-sm"
                                                                        id="btn_siguiente-{{ $sesion->id }}"
                                                                        onclick="btn_next({{ $sesion->id }});"
                                                                        style="margin-left: 2%;">
                                                                        <iconify-icon icon="el:arrow-right"
                                                                            style="color: white;"
                                                                            width="20"></iconify-icon>
                                                                    </button>

                                                                </header>
                                                                <div class="py-3 px-5">
                                                                    <h5 class="card-subtitle">Fecha
                                                                        <strong>{{ $sesion->meeting_date ? date('d/m/Y', strtotime($sesion->meeting_date)) : '' }}</strong>
                                                                    </h5>
                                                                    <h5 class="card-subtitle"><strong>Cursos</strong></h5>
                                                                    <ul>
                                                                        @foreach ($sesion->detalles as $detalle)
                                                                            <li>
                                                                                <span class="text-sm">
                                                                                    <iconify-icon
                                                                                        icon="heroicons:chevron-right-solid"></iconify-icon>
                                                                                </span>
                                                                                <span>{{ $detalle->curso->name_es }}
                                                                                </span>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>

                                                                    <p class="card-text mt-3">
                                                                        {{ $sesion->notas_sobre_sesion ? 'Notas: ' . $sesion->notas_sobre_sesion : '' }}
                                                                    </p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="grid xl:grid-cols-1 md:grid-cols-1 grid-cols-1 gap-5">
                                            @foreach ($sesiones as $sesion)
                                                <div class="card">
                                                    <div class="card-body" id="asistencia-{{ $sesion->id }}"
                                                        style="display: none">
                                                        <div class="card-text h-full">
                                                            <header
                                                                class="border-b px-4 pt-4 pb-3 flex items-center border-info-500">
                                                                <iconify-icon
                                                                    class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-info-500"
                                                                    icon="ph:info"></iconify-icon>
                                                                <h3 class="card-title mb-0 text-info-500">
                                                                    {{ $sesion->session_name }}
                                                                </h3>

                                                                <button class="ml-auto btn-dark btn btn-sm"
                                                                    id="btn_cerrar-{{ $sesion->id }}"
                                                                    onclick="btn_close({{ $sesion->id }});"
                                                                    style="display: none;"> cerrar
                                                                    <iconify-icon icon="el:close" style="color: white;"
                                                                        width="20"></iconify-icon>
                                                                </button>

                                                            </header>
                                                            <div class="py-3 px-5">
                                                                <h5 class="card-subtitle">Fecha
                                                                    <strong>{{ $sesion->meeting_date ? date('d/m/Y', strtotime($sesion->meeting_date)) : '' }}</strong>
                                                                </h5>
                                                                <h5 class="card-subtitle"><strong>Cursos</strong></h5>
                                                                <ul>
                                                                    @foreach ($sesion->detalles as $detalle)
                                                                        <li>
                                                                            <span class="text-sm">
                                                                                <iconify-icon
                                                                                    icon="heroicons:chevron-right-solid"></iconify-icon>
                                                                            </span>
                                                                            <span>{{ $detalle->curso->name_es }} </span>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                                <p class="card-text mt-3">
                                                                    {{ $sesion->notas_sobre_sesion ? 'Notas: ' . $sesion->notas_sobre_sesion : '' }}
                                                                </p>
                                                            </div>
                                                            <div class="py-3 px-5" align="right">
                                                                <a href="" class="btn ml-auto btn-dark btn-sm"
                                                                    data-bs-toggle="modal" data-bs-target="#modal-archivo"
                                                                    onclick="modal_archivo({{ $sesion->id }})">
                                                                    <iconify-icon icon="majesticons:document"
                                                                        width="13"></iconify-icon> Documento de
                                                                    Sesion</a>

                                                                <a href="" class="btn ml-auto btn-dark btn-sm"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modal-importar"
                                                                    onclick="modal_importar({{ $sesion->id }})"
                                                                    style="vertical-align: middle; pointer-events: ;">
                                                                    <iconify-icon icon="ri:file-excel-2-fill"
                                                                        width="13"></iconify-icon> Importar Archivo</a>
                                                            </div>

                                                        </div>
                                                        <div class="card-text h-full">
                                                            <div id="response-{{ $sesion->id }}"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                    aria-hidden="true" role="dialog" tabindex="-1"
                                                    id="modal-delete-{{ $sesion->id }}">

                                                    <form method="POST" action="{{ url('admin/delete_sesion') }}"
                                                        enctype="multipart/form-data">
                                                        @method('post')
                                                        @csrf


                                                        <div class="modal-dialog relative w-auto pointer-events-none">
                                                            <div
                                                                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                                <div
                                                                    class="relative bg-white rounded-lg shadow black:bg-slate-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-5 border-b rounded-t black:border-slate-600 bg-black-500">
                                                                        <h3
                                                                            class="text-base font-medium text-white dark:text-white capitalize">
                                                                            Eliminar Sesion
                                                                        </h3>
                                                                        <button type="button"
                                                                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                                                            data-bs-dismiss="modal">
                                                                            <svg aria-hidden="true" class="w-5 h-5"
                                                                                fill="#ffffff" viewbox="0 0 20 20"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                                    clip-rule="evenodd"></path>
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                            <input type="hidden" name="id_sesion"
                                                                                value="{{ $sesion->id }}">
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <div class="p-6 space-y-4">
                                                                        <div class="input-area relative">
                                                                            <input type="hidden" name="sesion"
                                                                                id="sesion">
                                                                            <label for="largeInput"
                                                                                class="form-label">Confirmar eliminar
                                                                                sesion</label>

                                                                        </div>

                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div
                                                                        class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                                        <button type="submit"
                                                                            class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                                                            style="margin-bottom: 15px">Aceptar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                            aria-hidden="true" role="dialog" tabindex="-1" id="modal-importar">

                                            <form method="POST" action="{{ url('admin/import_excel') }}"
                                                enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf


                                                <div class="modal-dialog relative w-auto pointer-events-none">
                                                    <div
                                                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow black:bg-slate-700">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="flex items-center justify-between p-5 border-b rounded-t black:border-slate-600 bg-black-500">
                                                                <h3
                                                                    class="text-base font-medium text-white dark:text-white capitalize">
                                                                    Importar Archivo
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                                                    data-bs-dismiss="modal">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="#ffffff" viewbox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-6 space-y-4">
                                                                <div class="input-area relative">
                                                                    <input type="hidden" name="sesion" id="sesion">
                                                                    <label for="largeInput" class="form-label">Subir
                                                                        archivo</label>
                                                                    <input type="file" name="fileExcel"
                                                                        class="form-control" accept=".xlsx, .xls">
                                                                </div>

                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div
                                                                class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                                <button type="submit"
                                                                    class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                                                    style="margin-bottom: 15px">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                            aria-hidden="true" role="dialog" tabindex="-1" id="modal-archivo">

                                            <form method="POST" action="{{ url('admin/archivo') }}"
                                                enctype="multipart/form-data">
                                                @method('POST')
                                                @csrf


                                                <div class="modal-dialog relative w-auto pointer-events-none">
                                                    <div
                                                        class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                        <div
                                                            class="relative bg-white rounded-lg shadow black:bg-slate-700">
                                                            <!-- Modal header -->
                                                            <div
                                                                class="flex items-center justify-between p-5 border-b rounded-t black:border-slate-600 bg-black-500">
                                                                <h3
                                                                    class="text-base font-medium text-white dark:text-white capitalize">
                                                                    Subir Archivo de Asistencia
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                                                                    data-bs-dismiss="modal">
                                                                    <svg aria-hidden="true" class="w-5 h-5"
                                                                        fill="#ffffff" viewbox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-6 space-y-4">
                                                                <div class="input-area relative">
                                                                    <input type="hidden" name="sesion" id="sesions">
                                                                    <label for="largeInput" class="form-label">Subir
                                                                        archivo</label>
                                                                    <input type="file" name="file"
                                                                        class="form-control">
                                                                </div>

                                                            </div>
                                                            <!-- Modal footer -->
                                                            <div
                                                                class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                                <button type="submit"
                                                                    class="btn inline-flex justify-center text-white bg-black-500 float-right"
                                                                    style="margin-bottom: 15px">Aceptar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
















    @livewireScripts


    <script>
        $(document).ready(function() {

        });

        function modal_importar(session_id) {
            $("#modal-importar").modal('show');
            document.getElementById('sesion').value = session_id;
        }

        function modal_archivo(session_id) {
            $("#modal-archivo").modal('show');
            document.getElementById('sesions').value = session_id;
        }


        function btn_next(sesion_id) {
            $("#btn_cerrar-" + sesion_id).show();
            $("#btn_siguiente-" + sesion_id).hide();

            $("#asistencia-" + sesion_id).show();
            $("#datos_generales").hide();
            $("#btn-agregar-" + sesion_id).hide();


            var parametros = {
                "session": sesion_id,
            };
            $.ajax({
                type: "get",
                url: "{{ url('admin/asistencia/mostrar') }}",
                data: parametros,
                success: function(data) {
                    console.log(data);
                    $('#response-' + sesion_id).html(data);

                }

            });



        }

        function btn_close(sesion_id) {
            $("#btn_cerrar-" + sesion_id).hide();
            $("#btn_siguiente-" + sesion_id).show();
            $("#btn-agregar-" + sesion_id).show();

            $("#asistencia-" + sesion_id).hide();
            $("#datos_generales").show();
        }

        function show_add_sesion() {
            $("#btn-cancelar").show();
            $("#btn-agregar").hide();

            $("#sesion_layout").show();
            $("#card_sesion_layout").hide();
            // card_sesion_layout
        }

        function hide_add_sesion() {
            $("#btn-cancelar").hide();
            $("#btn-agregar").show();

            $("#sesion_layout").hide();
            $("#card_sesion_layout").show();
        }
    </script>
@endsection
