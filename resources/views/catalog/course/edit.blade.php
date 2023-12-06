
@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Cursos Editar
                            <a href="{{ url('catalog/course') }}">
                                <button class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                    </div>
                </header>

                <div class="space-y-4">

                                            <form method="POST" action="{{ route('course.update', $courses->id) }}">
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre español') }}</label>
                                                    <input type="text" name="name_es" value="{{ $courses->name_es}}"
                                                        required class="form-control" value="{{ old('name_en') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('descripcion es') }}</label>
                                                    <input type="text" name="description_es" value="{{ $courses->description_es }}"
                                                        required class="form-control">
                                                </div>

                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">Documentacion</label>

                                                            <input type="file" name="imagen" id="fileInput"
                                                                style="display: none;">
                                                            <div id="imagen" name="imagen" class="dropzone"> </div>

                                                        </div>


                                                </div>

                                            <div style="text-align: right;">
                                                <button type="submit"
                                                    class="btn inline-flex justify-center btn-dark">{{ __('Aceptar') }}</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

