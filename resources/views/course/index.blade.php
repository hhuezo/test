@extends ('menu')
@section('contenido')
    <style>
        .contenedor {
            position: fixed !important;
            top: 97%;
            right: 0%;
            transform: translate(-50%, -50%);
        }

        .botonF1 {
            width: 60px;
            height: 60px;
            border-radius: 100%;
            background: #0F172A;
            right: 0;
            bottom: 0;
            position: absolute;
            margin-right: 16px;
            margin-bottom: 16px;
            border: none;
            outline: none;
            color: #FFF;
            font-size: 36px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            transition: .3s;
        }
    </style>
    @can('create course')
        <div class="contenedor">
            <button class="botonF1" data-bs-toggle="modal" data-bs-target="#modal-course">
                <span>+</span>
            </button>
        </div>
    @endcan


    <div class=" space-y-5">
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <div class="card-text h-full space-y-4">
            <form method="GET" action="{{ url('/course') }}">
                <div class="input-area">
                    <div class="relative">
                        <input type="text" name="search" value="{{ $search }}" class="form-control !pr-12"
                            placeholder="Buscar">
                        <button type="submit"
                            class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                            <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="grid grid-cols-12 gap-5 mb-5">

            @if ($courses->count() > 0)
                @foreach ($courses as $course)
                    <div class="card 2xl:col-span-3 lg:col-span-4 col-span-12">
                        <div>
                            <center><img style="margin-top: 20px; max-width:300px"
                                    src="{{ asset('img') }}/{{ $course->image }}" class="card-img-top img-fluid"
                                    alt="Card image">
                            </center>
                        </div>

                        <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                            <div>&nbsp; </div>
                            <h5 class="card-title">{{ $course->name_es }}</h5>

                            <p class="card-text">{{ $course->description_es }}</p>
                        </div>
                        <div class="card-footer">
                            @can('edit course')
                                <a href="{{ url('course/') }}/{{ $course->id }}/edit" class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="fluent:edit-32-filled" style="color: white;" width="20">
                                    </iconify-icon>
                                </a>
                            @endcan

                            @can('read course')
                                <a href="{{ url('course/') }}/{{ $course->id }}" class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="mdi:eye" style="color: white;" width="20"></iconify-icon>
                                </a>
                            @endcan

                        </div>
                    </div>
                @endforeach
            @else
                <div class="card 2xl:col-span-12 lg:col-span-12 col-span-12">
                    <!-- Theme Color Alerts -->


                        <div class="card-text h-full ">
                            <div class="space-y-5">
                                <div
                                    class="py-[18px] px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                                    <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                        <div class="flex-1">
                                            Datos no encontrados...
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                </div>
            @endif


        </div>


    </div>











    <!-- BEGIN: Modal -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="modal-course" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true">
        <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
              rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                            Nuevo curso
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                          dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                  11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ url('course') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Nombre</label>
                                <input type="text" name="name" required class="form-control"
                                    value="{{ old('name') }}" autofocus="true">
                            </div>


                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Descripción</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>

                            <div class="input-area relative">
                                <label for="largeInput" class="form-label">Imagen</label>
                                <input type="file" class="form-control" name="image" required>
                            </div>
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
    </div>
    <!-- END: Modals -->
    </div>
@endsection
