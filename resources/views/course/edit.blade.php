@extends ('menu')
@section('contenido')
    <style>
        #dropZone {
            width: 300px;
            height: 200px;
            border: 2px dashed #ccc;
            text-align: center;
            line-height: 200px;
        }

        #li {
            height: 13px;
        }
    </style>
    <div class=" space-y-5">
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <div class="grid grid-cols-12 gap-5 mb-5">


            <div class="card 2xl:col-span-3 lg:col-span-4 col-span-12">

                <div>
                    <center><img style="margin-top: 20px; max-width:300px" src="{{ asset('img') }}/{{ $course->image }}"
                            class="card-img-top img-fluid" alt="Card image">
                    </center>
                </div>

                <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                    <div>&nbsp; </div>
                    <h5 class="card-title">{{ $course->name_es }}</h5>
                    <div>&nbsp; </div>
                    <p class="card-text">{{ $course->description_es }}</p>
                </div>


                <div>&nbsp;</div>
                <!-- BEGIN: File Dropzone -->
                <div class="card rounded-md bg-white dark:bg-slate-800  shadow-base xl:col-span-2">
                    <div class="card-body flex flex-col p-6">
                        <header
                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">Subir material</div>

                            </div>
                        </header>
                        <div class="card-text h-full space-y-6">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div id="dropZone">
                                Drop files here
                            </div>
                            <div id="fileList"></div>
                            <form method="POST" enctype="multipart/form-data" action="{{ url('course/upload_file') }}">
                                @csrf
                                <input type="file" id="fileInput" name="files[]" style="display:none" multiple>
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                {{-- <div class="card rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base xl:col-span-2">
                                    <div class="card-body flex flex-col p-6">


                                        <div
                                            class="w-full text-center border-dashed border border-secondary-500 rounded-md py-[52px] flex justify-center items-center">
                                            <div role="presentation" tabindex="0"
                                                class="dropzone border-none dark:bg-slate-800" id="myUploader">
                                                <div class="dz-default dz-message">
                                                    <button class="dz-button" type="button">
                                                        <img src="{{ asset('assets/images/svg/upload.svg') }}"
                                                            alt="" class="mx-auto mb-4">
                                                        <p class="text-sm text-slate-500 dark:text-slate-300">Drop files
                                                            here or click to upload.</p>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                                <input class="btn btn-dark float-right" type="submit">
                            </form>
                        </div>



                    </div>
                </div>
                <!-- END: File Dropzone -->









            </div>

            <div class="card 2xl:col-span-9 lg:col-span-9 col-span-12">
                <div class="card h-full">
                    <div class="card-header">
                        <h4 class="card-title">Materiales</h4>
                        <div>
                            <a href="{{ url('course') }}">
                                <button class="btn btn-dark btn-sm">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="20">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-6">

                        <!-- BEGIN: Files Card -->


                        <ul class="divide-y divide-slate-100 dark:divide-slate-700">

                            @foreach ($files as $file)
                                <li class="block py-[8px]">
                                    <div class="flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                            <div class="flex-none">
                                                <div class="h-8 w-8">
                                                    @if (substr($file->route, -4) == '.pdf')
                                                        <iconify-icon icon="vscode-icons:file-type-pdf2"
                                                            style="font-size: 32px;"></iconify-icon>
                                                    @elseif (substr($file->route, -4) == '.doc' || substr($file->route, -4) == 'docx')
                                                        <iconify-icon icon="vscode-icons:file-type-word"
                                                            style="font-size: 32px;"></iconify-icon>
                                                    @elseif (substr($file->route, -4) == '.xls' || substr($file->route, -4) == 'xlsx')
                                                        <iconify-icon icon="vscode-icons:file-type-excel"
                                                            style="font-size: 32px;"></iconify-icon>
                                                    @elseif (substr($file->route, -4) == '.jpg' || substr($file->route, -4) == '.png' || substr($file->route, -4) == 'jpge')
                                                        <iconify-icon icon="bi:image-fill"
                                                            style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                    @elseif (substr($file->route, -4) == '.zip' || substr($file->route, -4) == '.rar')
                                                        <iconify-icon icon="subway:zip"
                                                            style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                    @else
                                                        <iconify-icon icon="mdi:file"
                                                            style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                    {{ $file->name }}
                                                </span>
                                                {{-- <span class="block font-normal text-xs text-slate-500 mt-1">
                                                    {{ date('d/m/Y') }} / 155MB
                                                </span> --}}
                                            </div>
                                        </div>
                                        <div class="flex-none">
                                            <a href="{{ asset('files') }}/{{ $file->route }}" target="_blank">
                                                <button type="button" class="text-xs text-slate-900 dark:text-white">

                                                    Descargar
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                        <!-- END: FIles Card -->
                    </div>

                    <div class="card-body p-6 embed-responsive embed-responsive-16by">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QjqsNMjpzFo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>

                    <div class="card-body px-6 pb-6">
                        <div class="overflow-x-auto -mx-6">
                            <div class="inline-block min-w-full align-middle">
                                <header class=" card-header noborder">
                                    <h4 class="card-title">Examenes </h4>
                                    <button class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#create_question">+</button>
                                </header>

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                                            <tr>
                                                <th scope="col" class=" table-th ">
                                                    #
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Nombre
                                                </th>

                                                <th scope="col" class=" table-th ">
                                                    Fecha
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Aciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                            <tr>
                                                <td class="table-td">1</td>
                                                <td class="table-td">Examen 1</td>
                                                <td class="table-td ">{{ date('d/m/Y') }}</td>

                                                <td class="table-td">
                                                    <a href="{{ url('quiz') }}">
                                                        <iconify-icon icon="mdi:eye"
                                                            style="color: #1769aa; font-size: 35px;"></iconify-icon>
                                                    </a>
                                                </td>
                                            </tr>
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

    <!-- BEGIN: Settings Modal pregunta -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="create_question" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">




        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Nuevo examen
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('quiz') }}">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <input type="hidden" name="course_id" value="{{$course->id}}">
                            <textarea class="form-control" rows="5" placeholder="titulo....." required name="name"></textarea>

                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Modals -->
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            const dropZone = document.getElementById('dropZone');
            const fileInput = document.getElementById('fileInput');
            const fileList = document.querySelector('#fileList');

            dropZone.addEventListener('dragover', (event) => {
                console.log(dropZone);
                event.preventDefault();
                event.dataTransfer.dropEffect = 'copy';
            });

            dropZone.addEventListener('drop', (event) => {
                event.preventDefault();
                const files = event.dataTransfer.files;
                fileInput.files = files;
                updateFileList(files);

            });



            $('#fileInput').on('change', function() {
                const files = $(this).prop('files');
                updateFileList(files);
            });

            function updateFileList(files) {
                fileList.innerHTML = '';
                for (const file of files) {
                    const listItem = document.createElement('li');
                    listItem.textContent = file.name;
                    fileList.appendChild(listItem);

                }

            }

            document.getElementById("dropZone").onclick = function() {
                document.getElementById("fileInput").click();
            }

        });
    </script>

@endsection
