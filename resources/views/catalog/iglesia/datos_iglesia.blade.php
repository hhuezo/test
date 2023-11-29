@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="flex flex-col justify-between min-h-screen">
        <div>

            <!-- END: Header -->
            <!-- END: Header -->
            <div class="content-wrapper transition-all duration-150" id="content_wrapper">
                <div class="page-content">
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">

                            <div class="space-y-5 profile-page">
                                <div
                                    class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                                    space-y-6 justify-between items-end relative z-[1]">
                                    <div
                                        class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg">
                                    </div>
                                    <div class="profile-box flex-none md:text-start text-center">
                                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                                            <div class="flex-none">
                                                <div
                                                    class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4                                                        ring-slate-100 relative">
                                                    <img src="{{ asset('/img') }}/{{ $iglesia->logo }}" alt=""
                                                        class="w-full h-full object-cover rounded-full">
                                                    <a href="profile-setting"
                                                        class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center                                      justify-center md:top-[140px] top-[100px]">
                                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <div
                                                    class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                                                    {{ $iglesia->name }}
                                                </div>
                                                <div class="text-sm font-light text-slate-600 dark:text-slate-400">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end profile box -->
                                    <div
                                        class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                                       {{-- <div class="flex-1" style="margin-top: 15px">

                                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1"
                                                align="center">
                                                <iconify-icon icon="logos:facebook" style="font-size: 37px;"></iconify-icon>
                                            </div>
                                            <div class="text-sm text-slate-600 font-light dark:text-slate-300"
                                                align="center">
                                            </div>
                                        </div>
                                        <!-- end single -->
                                         <div class="flex-1">
                                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                                200
                                            </div>
                                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                                Board Card
                                            </div>
                                        </div> --}}
                                        <!-- end single -->
                                        @if ($iglesia->status_id > 1)
                                            <div class="flex-1">
                                                <div class="flex-none">
                                                    <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4  ring-slate-100 relative"
                                                        style="max-width: 80px; max-height: 80px;">
                                                        <img src="{{ asset('img/qrcodeiglesia.png') }}" alt=""
                                                            class="w-full h-full object-cover rounded-full">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- end single -->
                                    </div>
                                    <!-- profile info-500 -->
                                </div>
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="lg:col-span-4 col-span-12">
                                        <div class="card h-full">
                                            <header class="card-header">
                                                <h4 class="card-title">Información general</h4>
                                            </header>
                                            <div class="card-body p-6">
                                                <ul class="list space-y-8">
                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:user"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Pastor
                                                            </div>
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->pastor_name }}
                                                            </a>
                                                        </div>
                                                    </li>

                                                    <!-- end single list -->
                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon
                                                                icon="heroicons:phone-arrow-up-right"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                Teléfono
                                                            </div>
                                                            <a href="tel:0189749676767"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->phone_number }}
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
                                                                Dirección
                                                            </div>
                                                            <div class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->address }}
                                                            </div>
                                                        </div>
                                                    </li>

                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:home"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                SITIO WEB
                                                            </div>
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->website }}
                                                            </a>
                                                        </div>
                                                    </li>

                                                    <li class="flex space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                            <iconify-icon icon="heroicons:clipboard-document-check"></iconify-icon>
                                                        </div>
                                                        <div class="flex-1">
                                                            <div
                                                                class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                                FACEBOOK
                                                            </div>
                                                            <a href="mailto:someone@example.com"
                                                                class="text-base text-slate-600 dark:text-slate-50">
                                                                {{ $iglesia->facebook }}
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <!-- end single list -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-8 col-span-12">
                                        <div class="card ">
                                            <header class="card-header">
                                                <h4 class="card-title">Grupos
                                                </h4>
                                            </header>
                                            <div class="card-body">

                                                <div class="inline-block min-w-full align-middle">
                                                    <div class="overflow-hidden ">
                                                        <table
                                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                                <tr>

                                                                    <th scope="col" class=" table-th ">
                                                                        Grupo
                                                                    </th>
                                                                    <th scope="col" class=" table-th ">
                                                                        Participantes
                                                                    </th>
                                                                    <th scope="col" class=" table-th ">
                                                                        Opciones
                                                                    </th>

                                                                    {{-- <th scope="col" class=" table-th ">
                                                                        Email
                                                                    </th> --}}

                                                                </tr>
                                                            </thead>
                                                            <tbody
                                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                                @foreach ($grupos_iglesia as $obj)
                                                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                        <td class="table-td">{{ $obj->nombre }}</td>
                                                                        <td class="table-td">{{ $obj->conteo }}</td>
                                                                        <td class="table-td ">
                                                                            <a
                                                                            href="{{ url('consulta_grupos') }}/{{ $obj->iglesia_grupo }}">
                                                                            <iconify-icon icon="healthicons:eye"
                                                                                style="color: #475569;"
                                                                                width="40"></iconify-icon>
                                                                        </a>
                                                                        <a
                                                                            href="{{ url('reporte_grupos/' . $obj->iglesia_grupo) }}">
                                                                            <iconify-icon icon="mdi:printer" style="color: #475569;"
                                                                                width="40"></iconify-icon>

                                                                        </a>

                                                                            <iconify-icon data-bs-toggle="modal"
                                                                                data-bs-target="#modal-viewqr-{{ $obj->id }}"
                                                                                icon="icons8:qr-code" style="color: #475569;"
                                                                                width="40"></iconify-icon>

                                                                        </a>

                                                                        </td>
                                                                    </tr>
                                                                    @include('catalog.iglesia.modal_viewqr')
                                                                @endforeach


                                                            </tbody>
                                                        </table>
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
            </div>
        </div>


    </div>
@endsection
