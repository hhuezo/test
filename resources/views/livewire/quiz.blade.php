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

        .form-control {
            font-weight: bold;
        }
    </style>



    <div class="contenedor" style="display: {{ $show_questions == 0 ? 'none' : 'block' }}">
        <button class="botonF1" data-bs-toggle="modal" data-bs-target="#create_question">
            <span>+</span>
        </button>
    </div>





    <div class="page-content">

        <div class=" md:flex justify-between items-center">
            <div>
                <!-- BEGIN: Breadcrumb -->
                <div class="mb-6">

                </div>
                <!-- END: BreadCrumb -->
            </div>
            <div class="flex flex-wrap ">
                <div class="card h-full">

                </div>
                <ul class="nav nav-pills flex items-center flex-wrap list-none pl-0 mr-4" id="pills-tabVertical"
                    role="tablist">
                    <li class="nav-item flex-grow text-center" role="presentation">
                        @if ($show_questions == 0)
                            <button wire:click="show_questions(1)"
                                class="btn inline-flex justify-center btn-white dark:bg-slate-700 dark:text-slate-300 m-1 active"
                                id="pills-grid-tab" data-bs-toggle="pill" data-bs-target="#pills-grid" role="tab"
                                aria-controls="pills-grid" aria-selected="true">
                                <span class="flex items-center">

                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="mdi:eye"
                                        style="color: white;"></iconify-icon>
                                    <span>Ver Preguntas</span>
                                </span>
                            </button>
                        @else
                            <button wire:click="show_questions(0)" style="display: none"
                                class="btn inline-flex justify-center btn-white dark:bg-slate-700 dark:text-slate-300 m-1 active"
                                id="pills-grid-tab" data-bs-toggle="pill" data-bs-target="#pills-grid" role="tab"
                                aria-controls="pills-grid" aria-selected="true">
                                <span class="flex items-center">

                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="mdi:eye-off"
                                        style="color: white;"></iconify-icon>
                                    <span>Ocultar Preguntas</span>
                                </span>
                            </button>
                        @endif

                        <a href="{{ url('Quiz') }}/10" target="_blank">
                            <button
                                class="btn inline-flex justify-center btn-white dark:bg-slate-700 dark:text-slate-300 m-1 active"
                                id="pills-list-tab" data-bs-toggle="pill" data-bs-target="#pills-list" role="tab"
                                aria-controls="pills-list" aria-selected="false">
                                <span class="flex items-center">
                                    <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2"
                                        icon="heroicons-outline:clipboard-list"></iconify-icon>
                                    <span>Ver examen</span>
                                </span>
                            </button>
                        </a>

                    </li>
                </ul>

            </div>
        </div>
        <div>&nbsp;</div>


        <div class="transition-all duration-150 container-fluid" id="page_layout">
            <div id="content_layout">

                <div class="space-y-5">
                    <div class="grid grid-cols-12 gap-5">

                        <div class="xl:col-span-2 col-span-12 lg:col-span-5 ">
                            &nbsp;
                        </div>
                        <div class="xl:col-span-8 col-span-12 lg:col-span-7">

                            <div class="card">
                                <header class="border-b px-4 pt-4 pb-3  items-center border-success-500">
                                    <strong>{{ $Quiz_name }}</strong>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal_edit_Quiz"
                                        class="float-right right-0 top-1/2  border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                        <iconify-icon icon="mdi:pencil-box" style="color: #1769aa;" width="40">
                                        </iconify-icon>
                                    </button>
                                </header>
                                <div class="lg:col-span-2 col-span-12 space-y-5">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="lg:col-span-2 col-span-12 space-y-5">
                                &nbsp;
                            </div>

                        </div>
                        <div class="xl:col-span-2 col-span-12 lg:col-span-5 ">
                            &nbsp;
                        </div>
                        @foreach ($questions as $question)
                            <div class="xl:col-span-2 col-span-12 lg:col-span-5 ">
                                &nbsp;
                            </div>
                            <div class="xl:col-span-8 col-span-12 lg:col-span-7">

                                <div class="card h-full">
                                    <header class="border-b px-4 pt-4 pb-3  items-center border-success-500">
                                        <div class="relative">
                                            <textarea class="form-control  !pr-12">{{ $question->description }}</textarea>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#modal_edit_question"
                                                wire:click="modal_edit_question({{ $question->id }},'{{ $question->description }}')"
                                                class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l border-l-slate-200 dark:border-l-slate-700 flex items-center justify-center">
                                                <iconify-icon icon="mdi:pencil-box" style="color: #1769aa;"
                                                    width="40"></iconify-icon>
                                            </button>
                                        </div>
                                        @error('question')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </header>

                                    <div class="card-body p-6">
                                        <div>
                                            <div class="h-full all-todos overflow-x-hidden"
                                                data-simplebar="data-simplebar">
                                                <strong>Indique una respuesta correcta.</strong>
                                                <ul
                                                    class="divide-y divide-slate-100 dark:divide-slate-700 -mb-6 h-full todo-list">
                                                    @foreach ($answers as $answer)
                                                        @if ($answer->catalog_questions_id == $question->id)
                                                            <li data-status="team" data-stared="false"
                                                                data-complete="false"
                                                                class="flex items-center px-6 space-x-4 py-6 hover:-translate-y-1 hover:shadow-todo transition-all duration-200 rtl:space-x-reverse">
                                                                <div class="todo-fav">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#modal_delete_answer"
                                                                        wire:click="modal_delete_answer({{ $answer->id }})"
                                                                        class="transition duration-150 hover:text-danger-500">
                                                                        <iconify-icon icon="el:trash-alt"
                                                                            style="color: #bb2424;" width="27">
                                                                        </iconify-icon>
                                                                    </button>
                                                                </div>
                                                                <span
                                                                    class="flex-1 text-sm text-slate-600 dark:text-slate-300 truncate bar-active transition-all duration-150">
                                                                    {{ $answer->description }}
                                                                </span>


                                                                <label
                                                                    class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                                    <input type="checkbox"
                                                                        {{ $answer->correct_answer == 1 ? 'checked' : '' }}
                                                                        wire:click="answer_correct({{ $answer->id }})"
                                                                        value="" class="sr-only peer">
                                                                    <div
                                                                        class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-success-500">
                                                                    </div>
                                                                </label>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div style="text-align: center">
                                            <button data-bs-toggle="modal"
                                                wire:click="modal_answer({{ $question->id }})"
                                                data-bs-target="#basic_modal"
                                                class="btn inline-flex justify-center btn-outline-dark capitalize">Agregar
                                                respuesta</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="lg:col-span-2 col-span-12 space-y-5">
                                &nbsp;
                            </div>
                        @endforeach
                    </div>


                </div>

            </div>
        </div>
    </div>









    <!-- BEGIN: Modal respuesta-->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        wire:ignore.self id="basic_modal" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">





        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
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
                    <form wire:submit.prevent="save_answer()">
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">

                            <textarea class="form-control" required wire:model="answer"></textarea>
                            @error('answer')
                                <span class="error">{{ $message }}</span>
                            @enderror
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




    <!-- BEGIN: Settings Modal pregunta -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        wire:ignore.self id="create_question" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">




        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Nueva pregunta
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
                    <form wire:submit.prevent="save_question()">
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <textarea class="form-control" required wire:model="question"></textarea>
                            @error('question')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
    <!-- END: Settings Modal -->





    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="modal_delete_answer" wire:ignore.self tabindex="-1" aria-labelledby="dangerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                        rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-danger-500">
                        <h3 class="text-base font-medium text-white dark:text-white">
                            Eliminar respuesta
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
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <h6 class="text-base text-slate-900 dark:text-white leading-6">
                            ¿Esta seguro que desea eliminar la respuesta?
                        </h6>

                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button type="button" wire:click="delete_answer()"
                            class="btn inline-flex justify-center text-white bg-danger-500">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- BEGIN: Settings Modal editar pregunta -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        wire:ignore.self id="modal_edit_question" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">

        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Modificar pregunta
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
                    <form wire:submit.prevent="edit_question()">
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <textarea class="form-control" rows="5" required wire:model="question"></textarea>
                            @error('question')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
    <!-- END: Settings Modal -->



    <!-- BEGIN: Settings Modal editar pregunta -->
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        wire:ignore.self id="modal_edit_Quiz" tabindex="-1" aria-labelledby="basic_modal" aria-hidden="true">

        <!-- BEGIN: Modal -->
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-xl font-medium text-white dark:text-white">
                            Modificar exámen {{$Quiz_name}}
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
                    <form wire:submit.prevent="edit_Quiz()">
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <textarea class="form-control" rows="5" required wire:model="Quiz_name"></textarea>
                            @error('question')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
    <!-- END: Settings Modal -->





    <script>
        window.addEventListener('close-modal', (e) => {
            $('#basic_modal').modal('hide')
        });

        window.addEventListener('close-modal-answer', (e) => {
            $('#create_question').modal('hide')
        });

        window.addEventListener('close-modal-delete-answer', (e) => {
            $('#modal_delete_answer').modal('hide')
        });

        window.addEventListener('close-modal-edit-question', (e) => {
            $('#modal_edit_question').modal('hide')
        });

        window.addEventListener('close-modal-edit-Quiz', (e) => {
            $('#modal_edit_Quiz').modal('hide')
        });
        //modal_edit_Quiz
    </script>


</div>
