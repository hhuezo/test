<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="overflow-x-auto -mx-6">
        <div class="inline-block min-w-full align-middle">
            <header class=" card-header noborder">
                <h4 class="card-title">Secciones </h4>
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#create_section">+</button>
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
            <div class="overflow-hidden">
                <!-- Acordion -->
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach($sections as $obj)
                    <div class="accordion-item" wire:click="change_tab({{$obj->id}})">
                        <h2 class="accordion-header" id="flush-heading{{$obj->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$obj->id}}" aria-expanded="false" aria-controls="flush-collapse{{$obj->id}}">
                                {{$obj->description}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$obj->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$obj->id}}" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="card-text h-full space-y-9">
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
                                    <form wire:submit.prevent="save_file({{$obj->id}})">

                                        <input type="file" id="fileInput" wire:model="archivos" multiple>
                                        <input type="hidden" value="{{ $course_id }}" wire:model="course_id">
                                        <input type="text" value="{{$obj->id}}" wire:model="section_id">
                                        <input class="btn btn-dark float-right" type="submit">
                                    </form>

                                    <div id="progressBar" style="padding-bottom: 2%;">
                                        <div class="bar"></div>
                                        <div class="percent">0%</div>
                                    </div>
                                </div>

                                <div class="card-body p-6">

                                    <!-- BEGIN: Files Card -->


                                    <ul class="divide-y divide-slate-100 dark:divide-slate-700">
                                        <div>

                                        </div>
                                        @foreach ($files as $file)
                                        @if($file->section_id == $obj->id)
                                        @if (substr($file->route, -3) != 'mp4' &&
                                        substr($file->route, -3) != 'mov' &&
                                        substr($file->route, -3) != 'wmv' &&
                                        substr($file->route, -3) != 'avi' &&
                                        substr($file->route, -3) != 'mkv')
                                        <li class="block py-[8px]">
                                            <div class="flex space-x-2 rtl:space-x-reverse">
                                                <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                                    <div class="flex-none">
                                                        <div class="h-8 w-8">
                                                            @if (substr($file->route, -4) == '.pdf')
                                                            <iconify-icon icon="vscode-icons:file-type-pdf2" style="font-size: 32px;"></iconify-icon>
                                                            @elseif (substr($file->route, -4) == '.doc' || substr($file->route, -4) == 'docx')
                                                            <iconify-icon icon="vscode-icons:file-type-word" style="font-size: 32px;"></iconify-icon>
                                                            @elseif (substr($file->route, -4) == '.xls' || substr($file->route, -4) == 'xlsx')
                                                            <iconify-icon icon="vscode-icons:file-type-excel" style="font-size: 32px;"></iconify-icon>
                                                            @elseif (substr($file->route, -4) == '.jpg' || substr($file->route, -4) == '.png' || substr($file->route, -4) == 'jpge')
                                                            <iconify-icon icon="bi:image-fill" style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                            @elseif (substr($file->route, -4) == '.zip' || substr($file->route, -4) == '.rar')
                                                            <iconify-icon icon="subway:zip" style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                            @else
                                                            <iconify-icon icon="mdi:file" style="color: #2a3f96; font-size: 32px;"></iconify-icon>
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
                                        @endif
                                        @endif
                                        @endforeach

                                    </ul>

                                    @foreach ($files as $file)
                                    @if (substr($file->route, -3) == 'mp4' ||
                                    substr($file->route, -3) == 'mov' ||
                                    substr($file->route, -3) == 'wmv' ||
                                    substr($file->route, -3) == 'avi' ||
                                    substr($file->route, -3) == 'mkv')
                                    <div class="card-text h-full space-y-10">

                                        <video class="w-full" id="player" playsinline="playsinline" controls="controls" data-poster="{{ asset('files') }}/{{ $file->route }}">
                                            <source src="{{ asset('files') }}/{{ $file->route }}" type="video/mp4">
                                        </video>
                                    </div>
                                    <div>&nbsp;</div>
                                    @endif

                                    @endforeach
                                    <!-- END: FIles Card -->

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" wire:ignore.self id="create_section" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">

        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Nuevo seccion
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <textarea class="form-control" rows="5" placeholder="description....." required wire:model="description"></textarea>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button type="submit" class="btn inline-flex justify-center text-white bg-black-500" wire:click="save_section()">Aceptar</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- END: Modals -->
    </div>
    <script>
        window.addEventListener('close-modal', (e) => {
            $('#create_section').modal('hide')
        });

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


            var progressBar = $('#progressBar');
            var bar = progressBar.find('.bar');
            var percent = progressBar.find('.percent');

            $('#uploadForm').ajaxForm({
                beforeSend: function() {
                    progressBar.fadeIn();
                    var percentVal = '0%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                success: function(html, statusText, xhr, $form) {
                    var percentVal = '100%';
                    bar.width(percentVal);
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    progressBar.fadeOut();
                }
            });

        });
    </script>
</div>