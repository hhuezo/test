@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar Datos de la iglesia

                                <a href="{{ url('catalog/iglesia') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button> &nbsp;
                                </a>
                            </div>
                        </div>
                    </header>

                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <div class="space-y-5">
                                <div class="grid grid-cols-12 gap-5">

                                    <div class="xl:col-span-12 col-span-12 lg:col-span-12">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('iglesia.update', $iglesia->id) }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre Español') }}</label>
                                                    <input type="text" name="name" value="{{ $iglesia->name }}"
                                                        required class="form-control" value="{{ old('name') }}"
                                                        autofocus="true">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                    <input type="text" name="address" value="{{ $iglesia->address }}"
                                                        required class="form-control" value="{{ old('address') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('departamento') }}</label>
                                                    <select name="catalog_departamento_id" class="form-control select">
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
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('municipio') }}</label>
                                                    <select name="catalog_municipio_id" class="form-control select">
                                                        @foreach ($municipio as $obj2)
                                                            @if ($obj2->departamento_id == $obj1->id)
                                                                <option value="{{ $obj2->id }}">{{ $obj2->nombre }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero telefonico') }}</label>
                                                    <input type="text" name="phone_mumber"
                                                        value="{{ $iglesia->phone_mumber }}" required class="form-control"
                                                        value="{{ old('course_id') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('notas') }}</label>
                                                    <input type="text" name="notas" value="{{ $iglesia->notas }}"
                                                        required class="form-control" value="{{ old('notas') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('nombre contacto') }}</label>
                                                    <input type="text" name="contact_name"
                                                        value="{{ $iglesia->contact_name }}" required class="form-control"
                                                        value="{{ old('contact_name') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('titulo de contacto en el trabajo') }}</label>
                                                    <input type="text" name="contact_job_title"
                                                        value="{{ $iglesia->contact_job_title }}" required
                                                        class="form-control" value="{{ old('contact_job_title') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero telefonico del contacto') }}</label>
                                                    <input type="text" name="contact_phone_number"
                                                        value="{{ $iglesia->contact_phone_number }}" required
                                                        class="form-control" value="{{ old('contact_phone_number') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero telefonico del contacto 2') }}</label>
                                                    <input type="text" name="contact_phone_number_2"
                                                        value="{{ $iglesia->contact_phone_number_2 }}" required
                                                        class="form-control" value="{{ old('contact_phone_number_2') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Lider Religioso') }}</label>
                                                    <input type="text" name="pastor_name"
                                                        value="{{ $iglesia->pastor_name }}" required class="form-control"
                                                        value="{{ old('pastor_name') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Telefono de Pastor') }}</label>
                                                    <input type="text" name="pastor_phone_number"
                                                        value="{{ $iglesia->pastor_phone_number }}" required
                                                        class="form-control" value="{{ old('pastor_phone_number') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Facebook') }}</label>
                                                    <input type="text" name="facebook"
                                                        value="{{ $iglesia->facebook }}" required class="form-control"
                                                        value="{{ old('facebook') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('sitio web') }}</label>
                                                    <input type="text" name="website" value="{{ $iglesia->website }}"
                                                        required class="form-control" value="{{ old('website') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Personeria Juridica') }}</label>
                                                    <input type="text" name="Personeria_Juridica"
                                                        value="{{ $iglesia->Personeria_Juridica }}" required
                                                        class="form-control" value="{{ old('Personeria_Juridica') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('tipo de organizacion') }}</label>
                                                    <select name="organization_type" class="form-control">
                                                        @foreach ($organizacion as $obj)
                                                            @if ($obj->id == $iglesia->organization_type)
                                                                <option value="{{ $obj->id }}" selected>
                                                                    {{ $obj->name }}
                                                                @else
                                                                <option value="{{ $obj->id }}">
                                                                    {{ $obj->name }}
                                                            @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Estatus</label>
                                                    <select name="Status" class="form-control">
                                                        @foreach ($estatuorg as $obj2)
                                                            @if ($obj2->id == $iglesia->Status)
                                                                <option value="{{ $obj2->id }}" selected>
                                                                    {{ $obj2->description }}
                                                                @else
                                                                <option value="{{ $obj2->id }}">
                                                                    {{ $obj2->description }}
                                                            @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Sede') }}</label>
                                                    <select name="sede_id" class="form-control select2">
                                                        @foreach ($sede as $obj3)
                                                            @if ($obj3->id == $iglesia->sede_id)
                                                                <option value="{{ $obj3->id }}" selected>
                                                                    {{ $obj3->nombre }}
                                                                @else
                                                                <option value="{{ $obj3->id }}">{{ $obj3->nombre }}
                                                            @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div></div>

                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">Imagen logo</label>
                                                            <input type="file" name="logo_name"
                                                                value="{{ old('logo_name') }}" class="form-control">

                                                        </div>
                                                        <p>
                                                    </div>
                                                    <p>
                                                    <div style="text-align: right;">
                                                        <button type="submit"
                                                            class="btn inline-flex justify-right btn-dark">{{ __('Aceptar') }}</button>
                                                    </div>
                                                    &nbsp;
                                                </div>

                                            </div>

                                        </form>

                                        &nbsp;&nbsp;
                                        <div class="btn btn-dark btn-sm float-right">
                                            <iconify-icon data-bs-toggle="modal"
                                                data-bs-target="#modal-create-{{ $iglesia->id }}" icon="mdi:plus-box"
                                                style="color: #ede9e9;" width="20"></iconify-icon>
                                        </div>

                                        <div class="input-area relative">
                                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Iglesia</th>
                                                        <th style="text-align: center">Idpregunta</th>
                                                        <th style="text-align: center">Pregunta</th>
                                                        <th style="text-align: center">Respuesta Si(Chequeado)/No</th>
                                                        <th style="text-align: center">Opciones</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($wizzaranswer as $obj)
                                                        <td align="center"> {{ $obj->iglesia_id }} </td>
                                                        <td align="center">{{ $obj->question_id }}</td>
                                                        <td align="center"> {{ $obj->pregunta->question }}</td>
                                                        <td align="center">
                                                            @if ($obj->answer == 1)
                                                                <fieldset>
                                                                    <legend></legend>
                                                                    <div>
                                                                        <input type="checkbox" id="answer"
                                                                            name="answer" value="answer" checked />
                                                                        <label for="answer">Si</label>
                                                                    </div>
                                                                @else
                                                                    <div>
                                                                        <input type="checkbox" id="answer"
                                                                            name="answer" value="answer" />
                                                                        <label for="answer">No</label>
                                                                    </div>
                                                                </fieldset>
                                                            @endif
                                                        </td>
                                                        <td align="center">
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-{{ $obj->id }}"
                                                                icon="mdi:pencil-box" style="color: #1769aa;"
                                                                width="40"></iconify-icon> &nbsp;&nbsp;
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-preg-{{ $obj->question_id }}"
                                                                icon="mdi:trash" style="color: #1769aa;"
                                                                width="40"></iconify-icon>

                                                        </td>
                                                        </tr>
                                                        @include('catalog.iglesia.modaleditanswer')
                                                        @include('catalog.iglesia.modaldelquestion')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            &nbsp;

                                            @include('catalog.iglesia.modalcreatequestion')
                                            &nbsp;

                                            {{-- @foreach ($wizzarquestion as $obj1)
                                                        <tr>  @include('catalog.iglesia.modaldelquestion')
                                                            @foreach ($wizzaranswer as $obj2)
                                                                @if ($obj1->id == $obj2->question_id)
                                                                <td align="center"> {{ $obj2->iglesia_id }} </td>
                                                                    <td align="center">{{ $obj2->question_id }}</td>
                                                                    <td align="center">{{ $obj1->question }}</td>
                                                                    <td align="center">
                                                                        @if ($obj2->answer == 1)
                                                                            <fieldset>
                                                                                <legend></legend>
                                                                                <div>
                                                                                    <input type="checkbox" id="answer"
                                                                                        name="answer" value="answer"
                                                                                        checked />
                                                                                    <label for="answer">Si</label>
                                                                                </div>
                                                                            @else
                                                                                <div>
                                                                                    <input type="checkbox" id="answer"
                                                                                        name="answer" value="answer" />
                                                                                    <label for="answer">No</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        @endif
                                                                    </td>
                                                                    <td align="center">
                                                                        <iconify-icon data-bs-toggle="modal"
                                                                            data-bs-target="#modal3"
                                                                            icon="mdi:pencil-box" style="color: #1769aa;"
                                                                            width="40"></iconify-icon>
                                                                    </td>
                                                                @endif
                                                                @include('catalog.iglesia.modaleditanswer')
                                                            @endforeach
                                                        </tr>

                                                    @endforeach --}}

                                        </div>

                                        &nbsp;&nbsp;

                                        <div class="input-area relative">
                                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Id</th>
                                                        <th style="text-align: center">Nombre Grupo</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($grupo_iglesias as $obj)
                                                        <td align="center"> {{ $obj->id }} </td>
                                                        <td align="center">{{ $obj->nombre }}</td>
                                                        <td align="center">
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                                style="color: #1769aa;" width="40"></iconify-icon>
                                                        </td>
                                                        @include('catalog.iglesia.modaldelgrupo')
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            &nbsp;
                                            <div class="btn btn-dark btn-sm float-right">
                                                <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-creategroup-{{$iglesia->id }}" icon="mdi:plus-box"
                                                    style="color: #ede9e9;" width="20"></iconify-icon>
                                            </div>
                                            @include('catalog.iglesia.modaladdgrupo')
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


@endsection
