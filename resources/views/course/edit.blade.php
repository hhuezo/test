@extends ('menu')
@section('contenido')
    @livewireStyles
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
                {{--  <div class="card-footer">
                    <a href="{{url('course/')}}/{{$course->id}}" class="btn btn-dark btn-sm float-right">
                    <iconify-icon icon="fluent:edit-32-filled" style="color: white;" width="20"></iconify-icon>
                </a>
                </div> --}}



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
                            <form method="POST" enctype="multipart/form-data" action="{{ url('course/upload_file') }}">
                                @csrf
                                {{-- style="display:none" --}}
                                <input type="file" id="fileInput" name="files[]" multiple style="display:none">
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="card rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base xl:col-span-2">
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
                                </div>
                                <div>&nbsp;</div>
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

                            {{-- <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                <img src="{{ asset('images/icon/file-1.svg') }}"  alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                Dashboard.fig
                                            </span>
                                            <span class="block font-normal text-xs text-slate-500 mt-1">
                                                06 June 2021 / 155MB
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <button type="button" class="text-xs text-slate-900 dark:text-white">
                                            Descargar
                                        </button>
                                    </div>
                                </div>
                            </li> --}}

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
                                    <h4 class="card-title">Examenes
                                    </h4>
                                </header>
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
                                                <td class="table-td ">{{date('d/m/Y')}}</td>

                                                <td class="table-td">
                                                    <a href="{{url('quiz')}}">
                                                    <iconify-icon icon="mdi:eye" style="color: #1769aa; font-size: 35px;"></iconify-icon>
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

    <script type="text/javascript">
        $(document).ready(function() {
            const dropZone = document.getElementById('myUploader');
            const fileInput = document.getElementById('fileInput');

            dropZone.addEventListener('dragover', (event) => {
                console.log(dropZone);
                event.preventDefault();
                event.dataTransfer.dropEffect = 'copy';
            });

            dropZone.addEventListener('drop', (event) => {
                event.preventDefault();
                const files = event.dataTransfer.files;
                fileInput.files = files;
            });

            document.getElementById("myUploader").onclick = function() {
                return false;
            }


        });
    </script>



    <livewire:quiz />
    @livewireScripts
@endsection
