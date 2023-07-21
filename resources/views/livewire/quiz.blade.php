<div>
    <style>
        .dd-handle:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }

        .contenedor {
            /* style="width: 90px;
            height: 240px;
            position: absolute;
            right: 0px;
            bottom: 0px;
            " */

            position: fixed;
            top: 97%;
            right: 0%;
            transform: translate(-50%, -50%);
        }

        .botonF1 {
            width: 60px;
            height: 60px;
            border-radius: 100%;
            background: #1769aa;
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



    <div class="content-wrapper transition-all duration-150 " id="content_wrapper">

        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
                    <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
                        @foreach ($preguntas as $pregunta)
                            <div class="card">
                                <div class="card-body flex flex-col p-6">
                                    <div class="card-text h-full">
                                        <header class="border-b px-4 pt-4 pb-3  items-center border-success-500">
                                            <div class="relative">
                                                <input type="text" value="{{ $pregunta->descripcion }}" readonly
                                                    class="form-control !pr-12">

                                                <button type="submit"
                                                    class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                    <iconify-icon icon="mdi:pencil-box" style="color: #1769aa;"
                                                        width="40"></iconify-icon>
                                                </button>
                                            </div>
                                            @error('question')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </header>

                                    </div>

                                    <div class="py-3 px-5">

                                        <div class="h-full all-todos overflow-x-hidden" data-simplebar="data-simplebar">
                                            <ul
                                                class="divide-y divide-slate-100 dark:divide-slate-700 -mb-6 h-full todo-list">
                                                @foreach ($respuestas as $respuesta)
                                                    @if ($respuesta->pregunta_id == $pregunta->id)
                                                        <li data-status="team" data-stared="false" data-complete="false"
                                                            class="flex items-center px-6 space-x-4 py-6 hover:-translate-y-1 hover:shadow-todo transition-all duration-200 rtl:space-x-reverse">
                                                            <div class="todo-fav">
                                                                <button type="button"
                                                                    class="transition duration-150 hover:text-danger-500">
                                                                    <iconify-icon icon="el:trash-alt"
                                                                        style="color: #bb2424;" width="27">
                                                                    </iconify-icon>
                                                                </button>
                                                            </div>
                                                            <span
                                                                class="flex-1 text-sm text-slate-600 dark:text-slate-300 truncate bar-active transition-all duration-150">
                                                                {{ $respuesta->descripcion }}
                                                            </span>

                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <button data-bs-toggle="modal" wire:click="modal_response({{ $pregunta->id }})"
                                            data-bs-target="#basic_modal"
                                            class="btn inline-flex justify-center btn-outline-dark capitalize">Agregar
                                            respuesta</button>
                                    </div>
                                    <div>&nbsp;</div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Themes Modal Area Start -->
                        {{-- <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <header
                                    class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Basic Modal</div>
                                    </div>
                                </header>
                                <div class="card-text h-full ">
                                    <div class="flex items-center flex-wrap gap-5">

                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contenedor">
        <button class="botonF1" data-bs-toggle="modal" data-bs-target="#create_proyecto">
            <span>+</span>
        </button>
    </div>




    @foreach ($preguntas as $pregunta)
        <div class="card">
            <div class="card-body">
                <div class="card-text h-full">
                    <header class="border-b px-4 pt-4 pb-3  items-center border-success-500">
                        <div class="relative">
                            <input type="text" value="{{ $pregunta->descripcion }}" class="form-control !pr-12"
                                placeholder="Nueva pregunta">
                        </div>
                        @error('question')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </header>
                </div>
                <div class="py-3 px-5">

                    <div class="h-full all-todos overflow-x-hidden" data-simplebar="data-simplebar">
                        <ul class="divide-y divide-slate-100 dark:divide-slate-700 -mb-6 h-full todo-list">
                            @foreach ($respuestas as $respuesta)
                                @if ($respuesta->pregunta_id == $pregunta->id)
                                    <li data-status="team" data-stared="false" data-complete="false"
                                        class="flex items-center px-6 space-x-4 py-6 hover:-translate-y-1 hover:shadow-todo transition-all duration-200 rtl:space-x-reverse">
                                        <div class="todo-fav">
                                            <button type="button"
                                                class="transition duration-150 hover:text-danger-500">
                                                <iconify-icon icon="el:trash-alt" style="color: #bb2424;"
                                                    width="27">
                                                </iconify-icon>
                                            </button>
                                        </div>
                                        <span
                                            class="flex-1 text-sm text-slate-600 dark:text-slate-300 truncate bar-active transition-all duration-150">
                                            {{ $respuesta->descripcion }}
                                        </span>

                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="text-align: center">
                    <button data-bs-toggle="modal" wire:click="modal_response({{ $pregunta->id }})"
                        data-bs-target="#basic_modal"
                        class="btn inline-flex justify-center btn-outline-dark capitalize">Agregar
                        respuesta</button>
                </div>
                <div>&nbsp;</div>

            </div>
        </div>
        <div>&nbsp;</div>
    @endforeach




    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        wire:ignore.self id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">




        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                            Nueva respuesta
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
                    <form wire:submit.prevent="save_response()">
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">

                            <textarea class="form-control" required wire:model="response"></textarea>
                            @error('response')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button type="submit"
                                class="btn inline-flex justify-center text-white bg-black-500">Accept</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END: Modals -->
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-text h-full">
                <form wire:submit.prevent="save_question()">
                    <header class="border-b px-4 pt-4 pb-3  items-center border-success-500">
                        <div class="relative">
                            <input type="text" wire:model="question" class="form-control !pr-12"
                                placeholder="Nueva pregunta">

                            <button type="submit"
                                class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                <iconify-icon icon="ic:baseline-save" width="32"></iconify-icon>
                            </button>
                        </div>
                        @error('question')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </header>
                </form>
            </div>
            </header>
            <div class="py-3 px-5">

            </div>

        </div>
    </div>




    <!-- BEGIN: Settings Modal -->
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96"
        tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300">
            <div>
                <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
                    Nueva pregunta
                </h3>

            </div>
            <button type="button"
                class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                data-bs-dismiss="offcanvas">
                <iconify-icon icon="line-md:close"></iconify-icon>
            </button>
        </div>
        <div class="offcanvas-body flex-grow overflow-y-auto">
            <div class="settings-modal">
                <div class="p-6">
                    <form class="input-area  items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
                        <textarea wire:model="question" class="form-control !pr-12"></textarea>
                        <div>&nbsp;</div>
                        <div class="divider"></div>
                        <button class="btn btn-dark float-right" type="submit">Aceptar</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Settings Modal -->



    <script>
        window.addEventListener('close-modal', (e) => {
            $('#basic_modal').modal('hide')
        });
    </script>


</div>
