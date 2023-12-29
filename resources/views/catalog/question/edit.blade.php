@extends ('menu')
@section('contenido')

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



<div class="card">


    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Preguntas

                                <a href="{{ url('catalog/question') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </header>



                    <div class="grid grid-cols-12 gap-5">
                        <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                            <div class="card p-6 h-full">
                                &nbsp;
                            </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12 lg:col-span-6">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('question.update', $questions->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="card h-full">
                                    <div class="grid pt-4 pb-3 px-4">
                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Descripción</label>
                                            <textarea resize="true" name="description"  id= "description" required class="form-control">{{ $questions->description }}</textarea>
                                        </div>
                                        &nbsp;
                                        <div style="text-align: right;">
                                            <button type="submit" style="margin-right: 18px" class="btn btn-dark">Aceptar</button>
                                        </div> &nbsp;

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body flex flex-col p-6">
                    <div class="grid grid-cols-12 gap-5">
                        <div class="xl:col-span-2 col-span-12 lg:col-span-2 ">
                            <div class="card p-6 h-full">
                                &nbsp;
                            </div>
                        </div>
                        <div class="xl:col-span-8 col-span-12 lg:col-span-8">
                            <form method="POST" action="{{ url('catalog/question/attach_questions') }}">
                                <div class="col-md-6">
                                    <div class="form-group row">

                                        <div class="xl:col-span-8 col-span-12 lg:col-span-8">
                                            <label class="form-label  ">Respuestas</label>
                                            <br>
                                            <div class="input-area relative pl-28">
                                                @csrf

                                                <input type="hidden" name="question_id" value="{{ $questions->id }}">
                                                <select name="answer_id" class="form-control mb-2 absolute left-0 top-1/2 -translate-y-1/2 block font-Inter font-medium capitalize" required style="height: 24;">
                                                    @foreach ($answers as $object)
                                                    <option value="{{ $object->id }}">
                                                        {{ $object->description }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <div style="text-align: right;">
                                                    <button type="submit" class="btn btn-dark">+</button>
                                                </div>


                                            </div>
                                            <br>


                                        </div>
                                    </div>
                                </div>
                            </form>

                            <button data-bs-toggle="modal" data-bs-target="#large_modal" class="btn inline-flex justify-center btn-light"><iconify-icon icon="ic:round-plus" width="24"></iconify-icon>&nbsp; Agregar Respuesta</button>
                            <br>
                            <br>

                            <div class="card-body">
                                <table id="myTable" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="display: none;">Id</th>
                                            <th>Respuestas</th>
                                            <th width="10%">Correcta</th>
                                            <th width="20%">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($question_has_answered as $obj)
                                        <tr>
                                            <td style="display: none;">{{ $obj->id }}</td>

                                            <td>
                                                {{ $obj->answers->description }}

                                            </td>
                                            <td align="center">
                                                @if($obj->correct == 1)
                                                <a data-bs-toggle="modal" data-bs-target="#modal-delete-correct-{{ $obj->id }}">Si </a>
                                                @else
                                                <a data-bs-toggle="modal" data-bs-target="#modal-correct-{{ $obj->id }}">No </a>
                                                @endif
                                            </td>

                                            <td align="center">
                                                &nbsp;&nbsp;
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-dettach-{{ $obj->id }}"><iconify-icon icon="mdi:trash" style="color: #1769aa;" width="26"></iconify-icon></button>
                                            </td>
                                        </tr>
                                        @include('catalog.question.modal_delete')
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="large_modal" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true">
                            <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
                                <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                                        <!-- Modal header -->

                                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                                            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
                                                Agregar Respuesta
                                            </h3>

                                            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form action="{{url('catalog/add_answer')}}" method="POST">
                                            <input type="hidden" name='catalog_questions_id' value="{{ $questions->id }}">

                                            @csrf
                                            <div class="p-6 space-y-4">
                                                <div class="input-area">
                                                    <label for="name" class="form-label">Descripción</label>
                                                    <input id="Respuesta" type="text" name="description" class="form-control" placeholder="Descripcion">
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                                <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" type="submit">Aceptar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="mb-3">

                    </div>
                </div>
            </div><!-- Row End  </form> -->


        </div>
    </div>
</div>
</div>



<div class="transition-all duration-150 container-fluid" id="page_layout">
    <div id="content_layout">
        <div class="space-y-5">

        </div>
    </div>
</div>



<!-- Row end  -->


<!-- Jquery Page Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>


<script type="text/javascript">
    function modal_edit(id, name) {
        //alert(id);
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        $('#usuario_edit_modal').modal('show');
    };
</script>

@endsection
