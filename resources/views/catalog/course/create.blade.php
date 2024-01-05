@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Crear Cursos
                                <a href="{{ url('catalog/course') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </header>
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

                                        <form method="POST" action="{{ url('catalog/course') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card h-full">

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" id="name" name="name" required
                                                        class="form-control">
                                                </div>
                                                &nbsp;


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Descripcion ') }}</label>
                                                    <input type="text" id="description" name="description" required
                                                        class="form-control">
                                                </div>
                                                &nbsp;


                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">Logo</label>

                                                            <input type="file" name="imagen" id="fileInput"
                                                                style="display: none;">
                                                            <div id="imagen" name="imagen" class="dropzone"> </div>

                                                        </div>
                                                        <p>
                                                    </div>
                                                </div>


                                                <div style="text-align: right;">
                                                    <button type="submit"
                                                        class="btn inline-flex justify-center btn-dark">{{ __('Aceptar') }}</button>
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
    <script type="text/javascript">
        // Configura Dropzone para el campo de entrada 'avatar'
        const avatarDropzone = new Dropzone('#imagen', {
            url: "{{ route('dropzone.store') }}", // Ruta de carga de avatar en Laravel
            paramName: 'imagen', // Nombre del campo que Laravel espera
            maxFilesize: 2, // Tamaño máximo de archivo en MB
            acceptedFiles: 'image/*', // Permitir cualquier tipo de archivo
            addRemoveLinks: true, // Mostrar el botón para quitar el archivo
            dictRemoveFile: "<br><button class='btn btn-danger'>Remover</button>", // Texto del botón para quitar el archivo
            dictDefaultMessage: "Arrastra aquí o haz clic para subir tu documento", // Cambia el título por defecto
            maxFile: 1,
        });

        document.getElementById('imagen').addEventListener('click', function() {
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



        document.getElementById('imagen').addEventListener('dragover', function(e) {
            e.preventDefault(); // Evita el comportamiento predeterminado de arrastrar y soltar
            this.style.backgroundColor = '#f0f0f0'; // Cambia el fondo para indicar que se puede soltar
        });

        document.getElementById('imagen').addEventListener('dragleave', function() {
            this.style.backgroundColor = ''; // Restaura el fondo al salir del área de soltar
        });


        document.getElementById('imagen').addEventListener('drop', function(e) {
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
