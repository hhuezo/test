@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
<style>
    .dz-error-message {
        display: none;
    }

    .dz-progress {
        display: none;
    }

    .dz-success-mark {
        display: none;
    }

    .dz-error-mark {
        display: none;
    }

    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        height: 300px;
    }

    .dropzone .dz-preview.dz-error .dz-error-message {
        display: none !important;
    }

    .dz-button {
        margin-top: -25px;
    }
</style>

<div class="page-content">
    <div class="transition-all duration-150 container-fluid" id="page_layout">
        <div id="content_layout">
            <div class="space-y-5 profile-page">
                <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0 space-y-6 justify-between items-end relative z-[1]">
                    <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg" style="background-color: #c12631 !important;"></div>
                    <div class="profile-box flex-none md:text-start text-center">
                        <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                            <div class="flex-none">
                                <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                ring-slate-100 relative">

                                    @if($iglesia->logo_url == null)
                                    <img src="{{asset('img/logo.png')}}" alt="" class="w-full h-full object-cover rounded-full">
                                    @else
                                    <img src="{{asset('images')}}/{{$iglesia->logo}}" alt="" class="w-full h-full object-cover rounded-full">
                                    @endif
                                    <a href="" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center justify-center md:top-[140px] top-[100px]" data-bs-toggle="modal" data-bs-target="#update-photo">
                                        <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                    </a>

                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                                    {{$iglesia->name}}
                                </div>
                                <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                    {{$iglesia->pastor_name}} (Pastor)
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end profile box -->
                    <div class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                        @if ($iglesia->status_id > 1)
                        <div class="flex-1">
                            <div class="flex-none">
                                <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4  ring-slate-100 relative" style="max-width: 80px; max-height: 80px;">
                                    <a href="{{ url('download/image') }}" title="Descargar Imagen"><img src="{{ asset('img/qrcodeiglesia.png') }}" alt="" class="w-full h-full object-cover rounded-full"></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1" style="text-transform: capitalize;">
                                {{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->cohorte->region->nombre}} <br> {{$codigos->where('id','=',4)->first()->abbrev}}{{str_pad($iglesia->id, 3, "0", STR_PAD_LEFT);}}

                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Region
                            </div>
                        </div>
                        <!-- end single -->
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1" style="text-transform: capitalize;">
                                {{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->cohorte->nombre}} <br>{{$codigos->where('id','=',2)->first()->abbrev}}{{str_pad($iglesia->sedeiglesia->cohorte_id, 3, "0", STR_PAD_LEFT);}}
                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Cohort
                            </div>
                        </div>
                        <!-- end single -->
                        <div class="flex-1">
                            <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1" style="text-transform: capitalize;">
                                {{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->nombre}} <br> {{$codigos->where('id','=',3)->first()->abbrev}}{{str_pad($iglesia->sede_id, 3, "0", STR_PAD_LEFT);}}
                            </div>
                            <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                Sede
                            </div>
                        </div>
                        <!-- end single -->
                    </div>
                    <!-- profile info-500 -->
                </div>

                <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" aria-hidden="true" role="dialog" tabindex="-1" id="update-photo">

                    <form method="POST" action="{{url('actualizar/imagen')}}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf


                        <div class="modal-dialog relative w-auto pointer-events-none">
                            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                <div class="relative bg-white rounded-lg shadow black:bg-slate-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-5 border-b rounded-t black:border-slate-600 bg-black-500">
                                        <h3 class="text-base font-medium text-white black:text-white capitalize">
                                            Actualizar Logo
                                        </h3>

                                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 black:hover:text-white" data-bs-dismiss="modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-4">

                                        <h6 class="text-base text-slate-900 black:text-white leading-6">

                                        </h6>

                                        <input type="hidden" name="id_iglesia" value="{{$iglesia->id}}">
                                        <input type="file" name="logo_name" class="form-control" accept="image/*">

                                    </div>
                                    <!-- Modal footer -->
                                    <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b black:border-slate-600">
                                        <button type="submit" class="btn inline-flex justify-center text-white bg-black-500 float-right" style="margin-bottom: 15px">Aceptar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="grid grid-cols-2 gap-6">

                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Datos Generales Iglesia</div>
                                </div>
                            </header>
                            <form method="POST" action="{{ route('iglesia.update', $iglesia->id) }}" enctype="multipart/form-data">
                                <div class="card-text h-full">
                                    <div>
                                        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs-home-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300" id="tabs-home-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-home-withIcon" role="tab" aria-controls="tabs-home-withIcon" aria-selected="true">
                                                    <iconify-icon class="mr-1" icon="majesticons:church-line"></iconify-icon>
                                                    Datos Iglesia</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs-profile-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-profile-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile-withIcon" role="tab" aria-controls="tabs-profile-withIcon" aria-selected="false">
                                                    <iconify-icon class="mr-1" icon="lucide:contact-2"></iconify-icon>
                                                    Datos de Contactos</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs-messages-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-messages-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-messages-withIcon" role="tab" aria-controls="tabs-messages-withIcon" aria-selected="false">
                                                    <iconify-icon class="mr-1" icon="fluent-mdl2:party-leader"></iconify-icon>
                                                    Datos de Lider</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a href="#tabs-settings-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-settings-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-settings-withIcon" role="tab" aria-controls="tabs-settings-withIcon" aria-selected="false">
                                                    <iconify-icon class="mr-1" icon="ion:share-social"></iconify-icon>
                                                    Redes Sociales</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="tabs-tabContent">
                                            <div class="tab-pane fade show active" id="tabs-home-withIcon" role="tabpanel" aria-labelledby="tabs-home-withIcon-tab">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Nombre de Iglesia</label>
                                                    <input type="text" name="name" id="name" value="{{ $iglesia->name }}" required class="form-control" autofocus="true">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Teléfono de Iglesia</label>
                                                    <input type="text" id="phone_number" name="phone_number" value="{{ $iglesia->phone_number }}" class="form-control" data-inputmask="'mask': ['9999-9999']">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Departamento</label>
                                                    <select name="catalog_departamento_id" id="catalog_departamento_id" class="form-control select">
                                                        @foreach ($deptos as $obj1)
                                                        @if ($obj1->id == $iglesia->catalog_departamento_id)
                                                        <option value="{{ $obj1->id }}" selected>
                                                            {{ $obj1->nombre }}
                                                            @else
                                                        <option value="{{ $obj1->id }}">{{ $obj1->nombre }}
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Municipio</label>
                                                    <select name="catalog_municipio_id" id="catalog_municipio_id" class="form-control select">
                                                        @foreach ($municipio as $obj2)
                                                        @if ($iglesia->catalog_departamento_id == $obj2->departamento_id)
                                                        <option value="{{ $obj2->id }}" selected>{{ $obj2->nombre }}
                                                        </option>
                                                        @else
                                                        <option value="{{ $obj2->id }}">{{ $obj2->nombre }}
                                                            @endif
                                                            @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Direccion</label>
                                                    <input type="text" id="address" name="address" value="{{ $iglesia->address }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-profile-withIcon" role="tabpanel" aria-labelledby="tabs-profile-withIcon-tab">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Nombre de Contacto</label>
                                                    <input type="text" id="contact_name" name="contact_name" value="{{ $iglesia->contact_name }}" class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Cargo de Contacto</label>
                                                    <input type="text" id="contact_job_title" name="contact_job_title" value="{{ $iglesia->contact_job_title }}" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Telefonico del contacto</label>
                                                    <input type="text" id="contact_phone_number" name="contact_phone_number" value="{{ $iglesia->contact_phone_number }}" class="form-control" data-inputmask="'mask': ['9999-9999']">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Email del contacto</label>
                                                    <input type="text" id="email_contact" name="email_contact" value="" class="form-control" readonly>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Contraseña</label>
                                                    <input type="password" id="password" name="password" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Confirme Contraseña</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Nombre de Contacto</label>
                                                    <input type="text" id="secondary_contact_name" name="secondary_contact_name" value="{{ $iglesia->contact_name }}" class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Cargo de Contacto</label>
                                                    <input type="text" id="secondary_contact_job_title" name="secondary_contact_job_title" value="{{ $iglesia->contact_job_title }}" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Telefono del contacto</label>
                                                    <input type="text" id="secondary_contact_phone_number" name="secondary_contact_phone_number" value="{{ $iglesia->contact_phone_number }}" class="form-control" data-inputmask="'mask': ['9999-9999']">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-messages-withIcon" role="tabpanel" aria-labelledby="tabs-messages-withIcon-tab">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Nombre Lider Religioso</label>
                                                    <input type="text" id="pastor_name" name="pastor_name" value="{{ $iglesia->pastor_name }}" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Telefono de Pastor</label>
                                                    <input type="text" name="pastor_phone_number" value="{{ $iglesia->pastor_phone_number }}" class="form-control" data-inputmask="'mask': ['9999-9999']">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Correo del Lider</label>
                                                    <input type="email" id="emailpastor" name="emailpastor" value="{{ $iglesia->emailpastor }}" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Personeria Juridica</label>
                                                    <input type="text" name="personeria_juridica" id="personeria_juridica" value="{{ $iglesia->personeria_juridica }}" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs-settings-withIcon" role="tabpanel" aria-labelledby="tabs-settings-withIcon-tab">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Facebook</label>
                                                    <input type="text" name="facebook" value="{{ $iglesia->facebook }}" required class="form-control" value="{{ old('facebook') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Sitio Web</label>
                                                    <input type="text" name="website" value="{{ $iglesia->website }}" class="form-control" value="{{ old('website') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Estado</label>
                                                    <select name="Status" class="form-control">
                                                        @foreach ($estatuorg as $obj2)
                                                        @if ($obj2->id == $iglesia->status_id)
                                                        <option value="{{ $obj2->id }}" selected>
                                                            {{ $obj2->description_es }}
                                                            @else
                                                        <option value="{{ $obj2->id }}">
                                                            {{ $obj2->description_es }}
                                                            @endif
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Notas</label>
                                                    <input type="text" id="notas" name="notas" value="{{ $iglesia->notas }}" class="form-control" value="{{ old('notas') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="btn btn-dark float-right">
                                    <button type="submit">Aceptar</button>


                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Grupos</div>
                                </div>
                            </header>
                            <div class="card-text h-full">
                                <div class="transition-all duration-150 container-fluid" id="page_layout">
                                    <div id="content_layout">
                                        <div class="space-y-5">
                                            <div class="grid grid-cols-12 gap-5">

                                                <div class="xl:col-span-12 col-span-12 lg:col-span-12">

                                                    &nbsp;&nbsp; @if ($grupos_noasignados->count() > 0)

                                                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-creategroup-{{ $iglesia->id }}">
                                                        <button class="btn btn-dark btn-sm float-right">
                                                            Agregar Grupo
                                                        </button>
                                                    </a>
                                                    <br>
                                                    <br>
                                                    @endif
                                                    <div class="input-area relative">
                                                        <table id="myTable2" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                                <tr class="td-table">

                                                                    <th style="text-align: center">Nombre Grupo</th>
                                                                    <th style="text-align: center">Imagen QR</th>
                                                                    <th style="text-align: center">Opciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                                <tr>
                                                                    @foreach ($grupo_iglesias as $obj)

                                                                    <td align="center">{{ $obj->nombre }}{{$obj->qrcodeiglesiagrupo}}</td>
                                                                    <td align="center"><a data-bs-toggle="modal" data-bs-target="#modal-viewqr-{{ $obj->id }}">
                                                                            <img src="{{asset('img/qrcodeiglesiagrupo')}}{{$obj->id}}.png" width="60"></a></td>
                                                                    <td align="center">
                                                                        <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:delete-circle" style="color: black;" width="40"></iconify-icon>
                                                                    </td>
                                                                    @include('catalog.iglesia.modal_del_grupo')
                                                                    @include('datos_iglesia.modal_viewqr')
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        &nbsp;


                                                        @include('catalog.iglesia.modal_add_grupo')

                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Preguntas Iniciales</div>
                                </div>
                            </header>
                            <div class="card-text h-full">
                                <div class="transition-all duration-150 container-fluid" id="page_layout">
                                    <div id="content_layout">
                                        <div class="space-y-5">
                                            <div class="grid grid-cols-12 gap-5">

                                                <div class="xl:col-span-12 col-span-12 lg:col-span-12">

                                                    &nbsp;&nbsp; @if ($wizzarquestion->count() > 0)

                                                    <a href="" data-bs-toggle="modal" data-bs-target="#modal-create-iglesia">
                                                        <button class="btn btn-dark btn-sm float-right">
                                                            Agregar Pregunta
                                                        </button>
                                                    </a>
                                                    @include('catalog.iglesia.modal_create_question')
                                                    <br>
                                                    @endif

                                                    <div class="input-area relative">
                                                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                                <tr class="td-table">
                                                                    <th style="text-align: center">Pregunta</th>
                                                                    <th style="text-align: center">Respuesta Si(Chequeado)/No</th>
                                                                    <th style="text-align: center">Opciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                                <tr>
                                                                    @foreach ($wizzaranswer as $obj)


                                                                    <td align="center"> {{ $obj->pregunta->question }}</td>
                                                                    <td align="center">
                                                                        @if ($obj->answer == 1)

                                                                        <div>
                                                                            <input type="checkbox" id="answer" name="answer" value="answer" checked />
                                                                            <label for="answer">Si</label>
                                                                        </div>
                                                                        @else
                                                                        <div>
                                                                            <input type="checkbox" id="answer" name="answer" value="answer" />
                                                                            <label for="answer">No</label>
                                                                        </div>

                                                                        @endif
                                                                    </td>
                                                                    <td align="center">
                                                                        <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-{{ $obj->id }}" icon="mdi:edit-circle" style="color: black;" width="40"></iconify-icon> &nbsp;&nbsp;
                                                                        <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-preg-{{ $obj->question_id }}" icon="mdi:delete-circle" style="color: black;" width="40"></iconify-icon>

                                                                    </td>
                                                                </tr>
                                                                @include('catalog.iglesia.modal_edit_answer')
                                                                @include('catalog.iglesia.modal_del_question')
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        &nbsp;


                                                        @include('catalog.iglesia.modal_add_grupo')

                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Participantes</div>
                                </div>
                            </header>
                            <div class="card-text h-full">
                                <div class="transition-all duration-150 container-fluid" id="page_layout">
                                    <div id="content_layout">
                                        <div class="space-y-5">
                                            <div class="grid grid-cols-12 gap-5">

                                                <div class="xl:col-span-12 col-span-12 lg:col-span-12">
                                                    &nbsp;&nbsp;
                                                    <div class="input-area relative">
                                                        <table id="myTable3" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                                <tr class="td-table">

                                                                    <th style="text-align: center">Nombre </th>
                                                                    <th style="text-align: center">Grupo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">

                                                                @foreach($iglesia->participantes_iglesia($iglesia->id) as $obj)
                                                                <tr>
                                                                    <td>{{$obj->nombre}}</td>
                                                                    <td style="text-align: center">{{$obj->grupo}}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        &nbsp;



                                                        &nbsp;
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
<script>
    $(document).ready(function() {
        $(":input").inputmask();
    });
</script>
<script>
    jQuery(function($) {

        $("#pastor_phone_number").mask("9999-9999");

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable3').DataTable();
        //combo para Departamento
        //combo para Departamento
        //$("#departamento_id").change();
        $("#catalog_departamento_id").change(function() {
            //alert('holi');
            // var para la Departamento
            var Departamento = $(this).val();

            $.get("{{ url('get_municipio/') }}" + '/' + Departamento, function(data) {

                console.log(data);
                var _select = ''
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                    '</option>';

                $("#catalog_municipio_id").html(_select);

            });

        });


    });
</script>
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

@endsection