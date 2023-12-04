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

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar datos de la iglesia

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
                                                    <label for="largeInput" class="form-label">Nombre</label>
                                                    <input type="text" name="name" id="name"  value="{{ $iglesia->name }}" required class="form-control" value="{{ old('name') }}" autofocus="true">
                                                </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                <input type="text" id="address" name="address" value="{{ $iglesia->address }}" required class="form-control" value="{{ old('address') }}">
                                            </div>

                                                {{--  <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Sede') }}</label>
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
                                            </div> --}}



                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('departamento') }}</label>
                                                    <select name="catalog_departamento_id" id="catalog_departamento_id"
                                                        class="form-control select">
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
                                                    <select name="catalog_municipio_id" id="catalog_municipio_id"
                                                        class="form-control select">
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
                                                    <label for="largeInput" class="form-label">Número teléfono</label>
                                                    <input type="text" id="phone_number" name="phone_number"
                                                        value="{{ $iglesia->phone_number }}" class="form-control"
                                                        value="{{ old('course_id') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('nombre contacto') }}</label>
                                                    <input type="text" id="contact_name" name="contact_name"
                                                        value="{{ $iglesia->contact_name }}" class="form-control"
                                                        value="{{ old('contact_name') }}">
                                                </div>
                                                {{-- <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('titulo de contacto en el trabajo') }}</label>
                                                    <input type="text" id="contact_job_title" name="contact_job_title"
                                                        value="{{ $iglesia->contact_job_title }}" required
                                                        class="form-control" value="{{ old('contact_job_title') }}">
                                                </div> --}}
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero telefonico del contacto') }}</label>
                                                    <input type="text" id="contact_phone_number"
                                                        name="contact_phone_number"
                                                        value="{{ $iglesia->contact_phone_number }}" class="form-control"
                                                        value="{{ old('contact_phone_number') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero telefonico del contacto 2') }}</label>
                                                    <input type="text" id="contact_phone_number_2"
                                                        name="contact_phone_number_2"
                                                        value="{{ $iglesia->contact_phone_number_2 }}" class="form-control"
                                                        value="{{ old('contact_phone_number_2') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Lider Religioso') }}</label>
                                                    <input type="text" id="pastor_name" name="pastor_name"
                                                        value="{{ $iglesia->pastor_name }}" required class="form-control"
                                                        value="{{ old('pastor_name') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Telefono de Pastor') }}</label>
                                                    <input type="text" name="pastor_phone_number"
                                                        value="{{ $iglesia->pastor_phone_number }}" class="form-control"
                                                        value="{{ old('pastor_phone_number') }}">
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
                                                        class="form-control" value="{{ old('website') }}">
                                                </div>

                                                {{-- <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Personeria Juridica') }}</label>
                                                <input type="text" name="Personeria_Juridica" value="{{ $iglesia->Personeria_Juridica }}" required class="form-control" value="{{ old('Personeria_Juridica') }}">
                                            </div> --}}


                                                {{-- <div class="input-area relative">
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
                                        </div> --}}

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
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('notas') }}</label>
                                                    <input type="text" id="notas" name="notas"
                                                        value="{{ $iglesia->notas }}" class="form-control"
                                                        value="{{ old('notas') }}">
                                                </div>



                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <div class="flex-none" id="div_img">
                                                                <div
                                                                    class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4                                                        ring-slate-100 relative">
                                                                    <img src="{{ asset('/images') }}/{{ $iglesia->logo }}"
                                                                        alt=""
                                                                        class="w-full h-full object-cover rounded-full">
                                                                    <button type="button" onclick="show_drop()"
                                                                        class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center                                      justify-center md:top-[140px] top-[100px]">
                                                                        <iconify-icon icon="mdi:edit-circle"
                                                                            style="color: #1769aa;"
                                                                            width="40"></iconify-icon>
                                                                    </button>
                                                                </div>
                                                            </div>


                                                            <!-- <input type="file" name="logo_name" value="{{ old('logo_name') }}" class="form-control"> -->

                                                            <input type="file" name="logo_name" id="fileInput"
                                                                style="display:none">
                                                            <div id="avatar" name="avatar" class="dropzone"
                                                                style="display:none"> </div>

                                                        </div>
                                                        <p>
                                                    </div>

                                                </div>


                                                &nbsp;



                                            </div>

                                            <div class="btn btn-dark float-right">
                                                <button type="submit">{{ __('Aceptar') }}</button>


                                            </div>
                                            <p>

                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                        </form>
                                        <div>
                                            <br>
                                            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>



                                        <div class="input-area relative">
                                            @if ($wizzarquestion->count() > 0)
                                                <button type="button" class="btn btn-black btn-sm float-right"
                                                    data-bs-toggle="modal" data-bs-target="#modal-create-iglesia"> Agregar
                                                    Pregunta
                                                    <iconify-icon icon="mdi:plus-box" style="color: #110f0f;"
                                                        width="20"></iconify-icon>
                                                </button>
                                            @endif
                                            <table id="myTable"
                                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                                cellspacing="0" width="100%">
                                                <thead class="bg-slate-200 dark:bg-slate-700">
                                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                        <th style="text-align: center">Iglesia</th>
                                                        <th style="text-align: center">Idpregunta</th>
                                                        <th style="text-align: center">Pregunta</th>
                                                        <th style="text-align: center">Respuesta Si(Chequeado)/No</th>
                                                        <th style="text-align: center">Opciones</th>

                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
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
                                                                icon="mdi:pencil" style="color: #1769aa;"
                                                                width="40"></iconify-icon> &nbsp;&nbsp;
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-preg-{{ $obj->question_id }}"
                                                                icon="mdi:trash" style="color: #1769aa;"
                                                                width="40"></iconify-icon>

                                                        </td>
                                                        </tr>
                                                        @include('catalog.iglesia.modal_edit_answer')
                                                        @include('catalog.iglesia.modal_del_question')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            &nbsp;

                                            @include('catalog.iglesia.modal_create_question')

                                            &nbsp;


                                        </div>

                                        &nbsp;&nbsp; @if ($grupos_noasignados->count() > 0)
                                            <div class="btn btn-black btn-sm float-right">
                                                Agregar Grupo <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-creategroup-{{ $iglesia->id }}"
                                                    icon="mdi:plus-box" style="color: #0f0d0d;"
                                                    width="20"></iconify-icon>
                                            </div>
                                        @endif
                                        <div class="input-area relative">
                                            <table id="myTable2"
                                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"
                                                cellspacing="0" width="100%">
                                                <thead class="bg-slate-200 dark:bg-slate-700">
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Id</th>
                                                        <th style="text-align: center">Nombre Grupo</th>
                                                        <th style="text-align: center">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody
                                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                    @foreach ($grupo_iglesias as $obj)
                                                        <td align="center"> {{ $obj->id }} </td>
                                                        <td align="center">{{ $obj->nombre }}</td>
                                                        <td align="center">
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-delete-{{ $obj->id }}"
                                                                icon="mdi:trash" style="color: #1769aa;"
                                                                width="40"></iconify-icon>
                                                        </td>
                                                        @include('catalog.iglesia.modal_del_grupo')
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
    </div>

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
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
