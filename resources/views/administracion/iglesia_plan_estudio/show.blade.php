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
                    <button id="btn-agregar"
                        class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1"
                        onclick="show_add_sesion()">
                        <span class="flex items-center">
                            <span>Agregar sesión</span>
                        </span>
                    </button>

                    <button id="btn-cancelar" style="display: none"
                        class="btn inline-flex justify-center btn-dark dark:bg-slate-700 dark:text-slate-300 m-1"
                        onclick="hide_add_sesion()">
                        <span class="flex items-center">
                            <span>Cancelar</span>
                        </span>
                    </button>
                </div>
            </div>



            <div class="content-wrapper transition-all duration-150" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid">
                        <div id="sesion_layout" style="display: none">
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
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->name }}
                                                            </a>
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
                                                            <a href="tel:0189749676767"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->grupo->nombre }}
                                                            </a>
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
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->start_date ? date('d/m/Y', strtotime($plan->start_date)) : '' }}
                                                            </a>
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
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $plan->end_date ? date('d/m/Y', strtotime($plan->end_date)) : '' }}
                                                            </a>
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
                                                                        {{ $participante->nombre }}
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
                                            </header>
                                        </div>
                                        <br>
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
                                                                    {{ $sesion->session_name }}</h3>

                                                                <button class="ml-auto btn-dark btn btn-sm">
                                                                    <iconify-icon icon="el:arrow-right"
                                                                        style="color: white;" width="20"></iconify-icon>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
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

    <script>
        $(document).ready(function() {

        });

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

    @livewireScripts
@endsection
