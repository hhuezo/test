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
                <div class="card rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base xl:col-span-2">
                    <div class="card-body flex flex-col p-6">
                        <header
                            class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">Subir material</div>

                            </div>
                        </header>
                        <div class="card-text h-full space-y-6">
                            <form method="POST" enctype="multipart/form-data" action="{{ url('course/upload_file') }}">
                                @csrf
                                <input type="file" id="fileInput" name="files">
                                <div class="card rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base xl:col-span-2">
                                    <div class="card-body flex flex-col p-6">

                                        <div id="dropZone"
                                            class="w-full text-center border-dashed border border-secondary-500 rounded-md py-[52px] flex justify-center items-center">
                                            <div role="presentation" tabindex="0"
                                                class="dropzone border-none dark:bg-slate-800" id="myUploader">
                                                <div class="dz-default dz-message">
                                                    <button class="dz-button" type="button">
                                                        <img src="assets/images/svg/upload.svg" alt=""
                                                            class="mx-auto mb-4">
                                                        <p class="text-sm text-slate-500 dark:text-slate-300">Drop files
                                                            here or click to upload.</p>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <input type="submit">
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

                            <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                <img src="{{ asset('images/icon/pdf-1.svg') }}" alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                Material1.pdf
                                            </span>
                                            <span class="block font-normal text-xs text-slate-500 mt-1">
                                                {{ date('d/m/Y') }} / 155MB
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <a href="{{ asset('docs') }}/normativa.pdf" target="_blank">
                                            <button type="button" class="text-xs text-slate-900 dark:text-white">
                                                Descargar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                <img src="{{ asset('images/icon/zip-1.svg') }}" alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                Material2.zip
                                            </span>
                                            <span class="block font-normal text-xs text-slate-500 mt-1">
                                                {{ date('d/m/Y') }} / 155MB
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <a href="{{ asset('docs') }}/normativa.zip" target="_blank">
                                            <button type="button" class="text-xs text-slate-900 dark:text-white">
                                                Descargar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                <img src="{{ asset('images/icon/pdf-2.svg') }}" alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                Material.pdf
                                            </span>
                                            <span class="block font-normal text-xs text-slate-500 mt-1">
                                                {{ date('d/m/Y') }} / 155MB
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <a href="{{ asset('docs') }}/normativa.pdf" target="_blank">
                                            <button type="button" class="text-xs text-slate-900 dark:text-white">
                                                Descargar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                <img src="{{ asset('images/icon/scr-1.svg') }}" alt=""
                                                    class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                Material4.jpg
                                            </span>
                                            <span class="block font-normal text-xs text-slate-500 mt-1">
                                                {{ date('d/m/Y') }}/ 155MB
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <a href="{{ asset('img') }}/{{ $course->image }}" target="_blank">
                                            <button type="button" class="text-xs text-slate-900 dark:text-white">
                                                Descargar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!-- END: FIles Card -->
                    </div>

                    <div class="card-body p-6 embed-responsive embed-responsive-16by">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QjqsNMjpzFo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>




        </div>


        <script type="text/javascript">
            $(document).ready(function() {
                const dropZone = document.getElementById('dropZone');
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

            });
        </script>



        <livewire:quiz />
        @livewireScripts
    @endsection
