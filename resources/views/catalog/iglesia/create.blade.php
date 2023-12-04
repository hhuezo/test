@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Ingresar Datos generales de la iglesia

                                <a href="{{ url('catalog/iglesia') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
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
                                        <form method="POST" action="{{ url('catalog/iglesia') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="name" id="name" required
                                                        class="form-control" value="{{ old('name') }}" autofocus="true">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                    <input type="text" name="address" id="address" required
                                                        class="form-control" value="{{ old('address') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Departamento') }}</label>
                                                    <select name="departamento_id" id="departamento_id"
                                                        class="form-control select2">
                                                        @foreach ($depto as $obj1)
                                                            <option value="{{ $obj1->id }}">{{ $obj1->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('municipio') }}</label>
                                                    <select name="municipio_id" id="municipio_id"
                                                        class="form-control select2">
                                                        @foreach ($municipio as $obj2)
                                                            @if ($obj2->departamento_id == $obj1->id)
                                                                <option value="{{ $obj2->id }}">{{ $obj2->nombre }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('telefono') }}</label>
                                                    <input type="text" name="phone_number" id="phone_number" required
                                                        class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ old('phone_number') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Notas') }}</label>
                                                    <input type="text" name="notes" id="notes" required
                                                        class="form-control" value="{{ old('notes') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre de Contacto') }}</label>
                                                    <input type="text" name="contac_name" id="contac_name" required
                                                        class="form-control" value="{{ old('contac_name') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Cargo del contacto') }}</label>
                                                    <input type="text" name="contact_job_title" id="contact_job_title"
                                                        required class="form-control"
                                                        value="{{ old('contact_job_title') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('telefono del contacto') }}</label>
                                                    <input type="text" name="contac_phone_number"
                                                        id="contac_phone_number"  required class="form-control" data-inputmask="'mask': ['9999-9999']"
                                                        value="{{ old('contac_phone_number') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre de segundo Contacto') }}</label>
                                                    <input type="text" name="secondary_contac_name"
                                                        id="secondary_contac_name" required class="form-control"
                                                        value="{{ old('secondary_contac_name') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Cargo del segundo contacto') }}</label>
                                                    <input type="text" id= "secondary_job_title" name="secondary_job_title" required
                                                        class="form-control" value="{{ old('secondary_job_title') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('telefono1 del Segundo  contacto') }}</label>
                                                    <input type="text"   name="secondary_contac_phone_number"
                                                        id="secondary_contac_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']"
                                                        value="{{ old('contac_phone_number') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('telefono2 del Segundo  contacto') }}</label>
                                                    <input type="text" name="secondary_contac_phone_number_2"
                                                        id="secondary_contac_phone_number_2" required class="form-control" data-inputmask="'mask': ['9999-9999']"
                                                        value="{{ old('contac_phone_number_2') }}">
                                                </div>
<div></div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre Lider Religioso') }}</label>
                                                    <input type="text" name="pastor_name" id="pastor_name" required
                                                        class="form-control" value="{{ old('pastor_name') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Correo del Lider</label>
                                                    <input type="email" id="emailpastor" name="emailpastor" class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Contraseña</label>
                                                    <input type="password" id="password" name="password" required class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Confirme Contraseña</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                                        class="form-control">
                                                </div>




                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label"> Telefono de Lider Religioso </label>
                                                    <input type="text" name="pastor_phone_number"
                                                        id="pastor_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']"
                                                        value="{{ old('pastor_phone_number') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Red social') }}</label>
                                                    <input type="text" name="facebook" id="facebook" required
                                                        class="form-control" value="{{ old('facebook') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('sitio web') }}</label>
                                                    <input type="text" name="website" id="website" required
                                                        class="form-control" value="{{ old('website') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Personeria Juridica') }}</label>
                                                    <input type="text" name="Personeria_Juridica"
                                                        id="Personeria_Juridica" required class="form-control"
                                                        value="{{ old('Personeria_Juridica') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Estatus</label>
                                                    <select id="status_id" name="Status" class="form-control">
                                                        @foreach ($estatuorg as $obj2)
                                                            <option value="{{ $obj2->id }}">
                                                                {{ $obj2->description_es }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>




                                              <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Sede') }}</label>
                                                <select id="sede_id" name="sede_id" class="form-control select2">
                                                    @foreach ($sede as $obj3)
                                                    <option value="{{ $obj3->id }}">{{ $obj3->nombre }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div></div>

                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">Imagen logo</label>

                                                            <input type="file" name="logo_name" id="fileInput"
                                                                style="display: none;">
                                                            <div id="avatar" name="avatar" class="dropzone"> </div>

                                                        </div>
                                                        <p>
                                                    </div>
                                                </div>
                                                <div></div>
                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">
                                                            <button type="submit"
                                                                class="btn btn-dark btn-sm float-right">{{ __('Aceptar') }}</button>
                                                            &nbsp;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(":input").inputmask();
        });
    </script>
   <script type="text/javascript">
        $(document).ready(function() {
            //combo para Departamento
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
