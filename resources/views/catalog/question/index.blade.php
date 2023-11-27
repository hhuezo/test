    @extends ('menu')
    @section('contenido')

        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



            <div class="card">
                <header class=" card-header noborder">
                    <h4 class="card-title">Listado de preguntas
                    </h4>
                    <a href="{{url('catalog/question/create')}}">
                    <button class="btn btn-outline-primary" >Nuevo</button>
                </a>
                </header>
                <div class="card-body px-6 pb-6">
                    <div style=" margin-left:20px; margin-right:20px; ">
                        <span class=" col-span-8  hidden"></span>
                        <span class="  col-span-4 hidden"></span>
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden " style=" margin-bottom:20px ">
                                <table id="myTable"  class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <th style="text-align: center">Id</th>
                                            <th>Descripción</th>
                                            <th style="text-align: center">Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @if ($questions->count() > 0)
                                            @foreach ($questions as $obj)
                                                <tr  class="even:bg-slate-50 dark:even:bg-slate-700">
                                                    <td align="center">{{ $obj->id }}</td>
                                                    <td>{{ $obj->description }}</td>
                                                    <td align="center">
                                                        <a href="{{url('catalog/question')}}/{{$obj->id}}/edit">
                                                        <iconify-icon icon="mdi:pencil"
                                                            style="color: #1769aa;" width="40"></iconify-icon>
                                                        </a>
                                                        &nbsp;&nbsp;
                                                        <iconify-icon data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                            style="color: #1769aa;" width="40"></iconify-icon>
                                                    </td>
                                                </tr>
                                                @include('catalog.question.modal')
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>



        <script type="text/javascript">
            function modal_edit(id, name) {
                //alert(id);
                document.getElementById('id').value = id;
                document.getElementById('name').value = name;
                $('#usuario_edit_modal').modal('show');
            };
        </script>

    @endsection
