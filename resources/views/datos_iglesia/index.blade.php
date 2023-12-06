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
                                                    <img src="{{ asset('/images') }}/{{ $iglesia->logo }}" alt=""
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
                                                            <iconify-icon
                                                                icon="heroicons:clipboard-document-check"></iconify-icon>
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

                                        <div class="card">
                                            <div class="card-body flex flex-col p-6">
                                                <header
                                                    class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                                    <div class="flex-1">
                                                        <a href="{{url('administracion/datos_iglesia')}}/{{$iglesia->id}}">
                                                        <button class="btn btn-dark btn-sm float-right"> Ver
                                                            participantes</button>
                                                        </a>
                                                    </div>
                                                </header>
                                                <div class="card-text h-full ">
                                                    <div>
                                                        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                                                            id="tabs-tab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a href="#tabs-home"
                                                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                                                    id="tabs-home-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#tabs-home" role="tab"
                                                                    aria-controls="tabs-home"
                                                                    aria-selected="true">Participantes</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a href="#tabs-profile"
                                                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                                    id="tabs-profile-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#tabs-profile" role="tab"
                                                                    aria-controls="tabs-profile"
                                                                    aria-selected="false">Grupos</a>
                                                                {{-- </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a href="#tabs-messages"
                                                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                                    id="tabs-messages-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#tabs-messages" role="tab"
                                                                    aria-controls="tabs-messages"
                                                                    aria-selected="false">Messages</a>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <a href="#tabs-settings"
                                                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                                                    id="tabs-settings-tab" data-bs-toggle="pill"
                                                                    data-bs-target="#tabs-settings" role="tab"
                                                                    aria-controls="tabs-settings"
                                                                    aria-selected="false">settings</a>
                                                            </li> --}}
                                                        </ul>
                                                        <div class="tab-content" id="tabs-tabContent">
                                                            <div class="tab-pane fade show active" id="tabs-home"
                                                                role="tabpanel" aria-labelledby="tabs-home-tab">

                                                                <div class="inline-block min-w-full align-middle">
                                                                    <div class="overflow-hidden ">
                                                                        <table
                                                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                                                <tr>

                                                                                    <th scope="col" class=" table-th ">
                                                                                        Nombre
                                                                                    </th>

                                                                                    <th scope="col" class=" table-th ">
                                                                                        Grupo
                                                                                    </th>

                                                                                    <th scope="col" class=" table-th ">
                                                                                        Aprobado
                                                                                    </th>

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody
                                                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                                                @foreach ($participantes as $participante)
                                                                                    <tr
                                                                                        class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                                        <td class="table-td">
                                                                                            {{ $participante->nombre }}</td>
                                                                                        <td class="table-td">
                                                                                            {{ $participante->grupo }}</td>
                                                                                        <td class="table-td "><label
                                                                                                class="switch">
                                                                                                <input type="checkbox"
                                                                                                    onchange="setEstado({{ $participante->id }})"
                                                                                                    {{ $participante->status_id == 2 ? 'checked' : '' }}>
                                                                                                <span
                                                                                                    class="slider round"></span>
                                                                                            </label></td>
                                                                                    </tr>
                                                                                @endforeach

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                            <div class="tab-pane fade" id="tabs-profile" role="tabpanel"
                                                                aria-labelledby="tabs-profile-tab">
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

                                                                                </tr>
                                                                            </thead>
                                                                            <tbody
                                                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                                                @foreach ($grupos_iglesia as $obj)
                                                                                    <tr
                                                                                        class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                                        <td class="table-td">
                                                                                            {{ $obj->nombre }}</td>
                                                                                        <td class="table-td">
                                                                                            {{ $obj->conteo }}</td>
                                                                                        <td class="table-td ">
                                                                                            @if ($iglesia->status_id > 1)
                                                                                                <a href="{{ url('reporte_grupos') }}/{{ $iglesia->id }}/{{ $obj->id }}"
                                                                                                    target="_blank">
                                                                                                    <iconify-icon
                                                                                                        icon="mdi:printer"
                                                                                                        style="color: #475569;"
                                                                                                        width="40"></iconify-icon>

                                                                                                </a>

                                                                                                <iconify-icon
                                                                                                    data-bs-toggle="modal"
                                                                                                    data-bs-target="#modal-viewqr-{{ $obj->id }}"
                                                                                                    icon="icons8:qr-code"
                                                                                                    style="color: #475569;"
                                                                                                    width="40"></iconify-icon>

                                                                                                </a>
                                                                                            @endif

                                                                                        </td>
                                                                                    </tr>
                                                                                    @include('datos_iglesia.modal_viewqr')
                                                                                @endforeach


                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="tab-pane fade" id="tabs-messages" role="tabpanel"
                                                                aria-labelledby="tabs-messages-tab">
                                                                <p class="text-sm text-gray-500 dark:text-gray-200">
                                                                    This is some placeholder content the
                                                                    <strong>Messages</strong>
                                                                    tab's associated content. Clicking another tab will
                                                                    toggle the visibility of this one for the next. The tab
                                                                    JavaScript swaps classes to control the content
                                                                    visibility and styling. consectetur adipisicing elit. Ab
                                                                    ipsa!
                                                                </p>
                                                            </div>
                                                            <div class="tab-pane fade" id="tabs-settings" role="tabpanel"
                                                                aria-labelledby="tabs-settings-tab">
                                                                <p class="text-sm text-gray-500 dark:text-gray-200">
                                                                    This is some placeholder content the
                                                                    <strong>Settings</strong>
                                                                    tab's associated content. Clicking another tab will
                                                                    toggle the visibility of this one for the next. The tab
                                                                    JavaScript swaps classes to control the content
                                                                    visibility and styling. consectetur adipisicing elit. Ab
                                                                    ipsa!
                                                                </p>
                                                            </div> --}}
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


    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Código a ejecutar cuando la página esté completamente cargada
            console.log("La página ha sido completamente cargada.");
        });

        function setEstado(id) {
            // Enviar la solicitud POST usando jQuery
            $.ajax({
                url: "{{ url('administracion/datos_iglesia/set_estado') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    // Manejar la respuesta exitosa si es necesario
                    console.log(response);
                },
                error: function(error) {
                    // Manejar el error si es necesario
                    console.error(error);
                }
            });
        }
    </script>
@endsection
