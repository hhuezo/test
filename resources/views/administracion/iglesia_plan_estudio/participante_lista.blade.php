@extends ('menu')
@section('contenido')
<div class="flex flex-col justify-between min-h-screen">
    <div>

        <div class=" md:flex justify-between items-center">
            <div>
            </div>
            <div class="flex flex-wrap ">


            </div>
        </div>


        @if($member->status_id == 1)
        <div class="content-wrapper transition-all duration-150" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid">
                    <div id="card_sesion_layout">
                        <div class="space-y-5 profile-page">
                            <div class="grid grid-cols-12 gap-6">

                                <div class="lg:col-span-4 col-span-12">
                                    <div class="card h-full">
                                        <header class="card-header">
                                            <h4 class="card-title">No esta aprobado!!! </h4>
                                        </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else


        <div class="content-wrapper transition-all duration-150" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid">

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
                                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Iglesia
                                                        </div>
                                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
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
                                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Grupo
                                                        </div>
                                                        <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50">
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
                                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
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
                                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Fecha inicio
                                                        </div>
                                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
                                                            {{ $plan->start_date ? date('d/m/Y', strtotime($plan->start_date)) : '' }}
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="flex space-x-3 rtl:space-x-reverse">
                                                    <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                        <iconify-icon icon="heroicons:calendar-days"></iconify-icon>
                                                    </div>
                                                    <div class="flex-1">
                                                        <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                            Fecha final
                                                        </div>
                                                        <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
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
                                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">

                                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

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
                                            <div class="card-body" id="datos_generales-{{ $sesion->id }}">
                                                <div class="card-text h-full">
                                                    <header class="border-b px-4 pt-4 pb-3 flex items-center border-info-500">

                                                    </header>


                                                </div>
                                            </div>
                                            <div class="card-body" id="asistencia-{{ $sesion->id }}">
                                                <div class="card-text h-full">
                                                    <header class="border-b px-4 pt-4 pb-3 flex items-center border-info-500">
                                                        <iconify-icon class="text-3xl inline-block ltr:mr-2 rtl:ml-2 text-info-500" icon="ph:info"></iconify-icon>
                                                        <h3 class="card-title mb-0 text-info-500">
                                                            {{ $sesion->session_name }}
                                                        </h3>


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
                                                                    <iconify-icon icon="heroicons:chevron-right-solid"></iconify-icon>
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
                                                <div class="card-text h-full">
                                                    <div class="py-3 px-5">
                                                        <ul>

                                                            <table class="divide-y divide-slate-100 table-fixed black:divide-slate-700" cellspacing="0" width="100%">
                                                                <thead class="bg-slate-200 black:bg-slate-700">
                                                                    <tr class="even:bg-slate-50 black:even:bg-slate-700">
                                                                        <th style="text-align: left;padding-top: 1%; padding-bottom:1%">
                                                                            Nombre de Participante</th>
                                                                        <th style="text-align: left;padding-top: 1%; padding-bottom:1%">
                                                                            Asistencia</th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white divide-y divide-slate-100 black:bg-slate-800 black:divide-slate-700">

                                                                    @foreach ($sesion->asistencias as $obj)
                                                                    <tr class="even:bg-slate-50 black:even:bg-slate-700">
                                                                        @if ($obj->member_id)
                                                                        <td class="pt-25 pb-25" style=" padding-top: 1%; padding-bottom:1%">
                                                                            {{ $obj->participante->name_member }}
                                                                            {{ $obj->participante->lastname_member }}
                                                                        </td>
                                                                        @else
                                                                        <td></td>
                                                                        @endif
                                                                        <td align="center">
                                                                            <div class="checkbox-area">
                                                                                <label class="inline-flex items-center cursor-pointer">
                                                                                    <input type="checkbox" class="hidden" name="checkbox" {{ $obj->attended == 1 ? 'checked' : '' }}>
                                                                                    <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150
                                                                                                    bg-slate-100 dark:bg-slate-900">
                                                                                        <img src="{{ asset('assets/images/icon/ck-white.svg') }}" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>

                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>

                                                        </ul>
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
        @endif
    </div>

</div>
@endsection