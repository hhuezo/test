@extends ('menu')
@section('contenido')

@livewireStyles
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
    .accordion-button{position:relative;display:flex;align-items:center;width:100%;padding:1rem 1.25rem;font-size:1rem;color:#212529;text-align:left;background-color:#fff;border:0;border-radius:0;overflow-anchor:none;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,border-radius .15s ease}@media (prefers-reduced-motion:reduce){.accordion-button{transition:none}}.accordion-button:not(.collapsed){color:#0c63e4;background-color:#e7f1ff;box-shadow:inset 0 -1px 0 rgba(0,0,0,.125)}.accordion-button:not(.collapsed)::after{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230c63e4'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");transform:rotate(-180deg)}.accordion-button::after{flex-shrink:0;width:1.25rem;height:1.25rem;margin-left:auto;content:"";background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");background-repeat:no-repeat;background-size:1.25rem;transition:transform .2s ease-in-out}@media (prefers-reduced-motion:reduce){.accordion-button::after{transition:none}}.accordion-button:hover{z-index:2}.accordion-button:focus{z-index:3;border-color:#86b7fe;outline:0;box-shadow:0 0 0 .25rem rgba(13,110,253,.25)}.accordion-header{margin-bottom:0}
    .accordion-flush .accordion-collapse{border-width:0}
    .accordion-item{background-color:#fff;border:1px solid rgba(0,0,0,.125)}.accordion-item:first-of-type{border-top-left-radius:.25rem;border-top-right-radius:.25rem}.accordion-item:first-of-type .accordion-button{border-top-left-radius:calc(.25rem - 1px);border-top-right-radius:calc(.25rem - 1px)}.accordion-item:not(:first-of-type){border-top:0}.accordion-item:last-of-type{border-bottom-right-radius:.25rem;border-bottom-left-radius:.25rem}.accordion-item:last-of-type .accordion-button.collapsed{border-bottom-right-radius:calc(.25rem - 1px);border-bottom-left-radius:calc(.25rem - 1px)}.accordion-item:last-of-type .accordion-collapse{border-bottom-right-radius:.25rem;border-bottom-left-radius:.25rem}.accordion-body{padding:1rem 1.25rem}.accordion-flush .accordion-collapse{border-width:0}.accordion-flush .accordion-item{border-right:0;border-left:0;border-radius:0}.accordion-flush .accordion-item:first-child{border-top:0}.accordion-flush .accordion-item:last-child{border-bottom:0}.accordion-flush .accordion-item .accordion-button{border-radius:0}
</style>
<!-- estilo para acordeon -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" id="accordion" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<div class=" space-y-5">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">


        <div class="card 2xl:col-span-3 lg:col-span-4 col-span-12">

            <div>
                <center><img style="margin-top: 20px; max-width:300px" src="{{ asset('img') }}/{{ $course->image }}" class="card-img-top img-fluid" alt="Card image">
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
            <!-- <div class="card rounded-md bg-white dark:bg-slate-800  shadow-base xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
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
                        <form method="POST" id="uploadForm" enctype="multipart/form-data" action="{{ url('course/upload_file') }}">
                            @csrf
                            <input type="file" id="fileInput" name="files[]" style="display:none" multiple>
                            <input type="hidden" name="course_id" value="{{ $course->id }}"> -->
                            <!-- {{-- <div class="card rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base xl:col-span-2">
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
    </div> --}} -->
                            <!-- <input class="btn btn-dark float-right" type="submit">
                        </form>
                        <div id="progressBar">
                            <div class="bar"></div>
                            <div class="percent">0%</div>
                        </div>
                    </div>



                </div>
            </div> -->
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

                <!--
                {{-- <div class="card-body p-6 embed-responsive embed-responsive-16by">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QjqsNMjpzFo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div> --}} -->

                <div class="card-body px-6 pb-6" >
                @livewire('section', ['id' => $course->id])

                </div>


                <div class="card-body px-6 pb-6" >
                    <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle">
                            <header class=" card-header noborder">
                                <h4 class="card-title">Examenes </h4>
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#create_question">+</button>
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
                            <div class="overflow-hidden " >
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" >
                                    <thead class=" border-t border-slate-100 dark:border-slate-800">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                #
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Nombre
                                            </th>

                                            <th scope="col" class=" table-th ">
                                                Status
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @php($i = 1)
                                        @foreach ($Quizes as $Quiz)
                                        <tr>
                                            <td class="table-td">{{ $i }}</td>
                                            <td class="table-td">{{ $Quiz->name_es }}</td>
                                            <td class="table-td">{{ $Quiz->status }}</td>

                                            <td class="table-td">
                                                <a href="{{ url('Quiz') }}/{{ $Quiz->id }}/edit">
                                                    <iconify-icon icon="mdi:eye" style="color: #1769aa; font-size: 35px;"></iconify-icon>
                                                </a>
                                            </td>
                                        </tr>
                                        @php($i++)
                                        @endforeach

                                        <!-- {{-- <tr>
                                                <td class="table-td">1</td>
                                                <td class="table-td">Examen 1</td>
                                                <td class="table-td ">{{ date('d/m/Y') }}</td>

                                        <td class="table-td">
                                            <a href="{{ url('Quiz') }}">
                                                <iconify-icon icon="mdi:eye" style="color: #1769aa; font-size: 35px;"></iconify-icon>
                                            </a>
                                        </td>
                                        </tr> --}} -->
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
<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="create_question" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">




    <!-- BEGIN: Modal -->
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                    <h3 class="text-xl font-medium text-white dark:text-white">
                        Nuevo examen
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form method="POST" action="{{ url('Quiz') }}">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <textarea class="form-control" rows="5" placeholder="titulo....." required name="name"></textarea>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-right justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button type="submit" class="btn inline-flex justify-right text-white bg-black-500">Aceptar</button>
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
@livewireScripts
@endsection
