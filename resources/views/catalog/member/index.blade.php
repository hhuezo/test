@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title"> Participantes </h4>
        <div align="rigth">

            <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modal-import">Importar Participantes</button>

            <a href="{{ url('catalog/member/create') }}">
                <button class="btn btn-dark">Nuevo</button>
            </a>
        </div>
    </header>
    <div class="card-body px-6 pb-6">
        <div style=" margin-left:20px; margin-right:20px; ">
            <span class=" col-span-8  hidden"></span>
            <span class="  col-span-4 hidden"></span>
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden " style=" margin-bottom:20px ">
                    <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr class="td-table">
                                <th style="text-align: center">Id</th>
                                <th style="text-align: left">Nombre</th>
                                <th style="text-align: left">Iglesia</th>
                                <th style="text-align: center">opciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                            @foreach ($participantes as $obj)
                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                <td align="center">{{ $obj->id }}</td>
                                <td>{{ $obj->nombre }} {{ $obj->apellido }} </td>
                                <td>{{ $obj->iglesia }}</td>
                                <td align="center">
                                    <a href="{{ url('catalog/member') }}/{{ $obj->id }}/edit">
                                        <iconify-icon icon="mdi:edit-circle" style="color: #1e293b;" width="40"></iconify-icon>
                                    </a>
                                    &nbsp;&nbsp;
                                    <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;" width="40" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                </td>
                            </tr>
                            @include('catalog/member/modal')
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" aria-hidden="true" role="dialog" tabindex="-1" id="modal-import">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                          rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-black-500">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            Importar Archivo (Excel)
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                      dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                              11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">

                        <form method="POST" action="{{ url('catalog/member/import_excel') }}" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <label for="largeInput" class="form-label">Iglesia</label>
                            <select id="iglesia" name="iglesia" class="form-control" required>
                                @if(auth()->user()->hasRole('administrador') == true)
                                <option value="">Seleccione...</option>
                                @endif
                                @foreach ($iglesias as $obj)
                                <option value="{{ $obj->id }}" >
                                    {{ $obj->name }}
                                </option>
                                @endforeach
                            </select>
                            <br>
                            <label for="largeInput" class="form-label">Subir archivo</label>
                            <input type="file" name="fileExcel" required class="form-control" accept=".xlsx, .xls">

                            <br>
                            <div style="text-align: right;">
                                <button type="submit" class="btn inline-flex justify-center btn-dark">Guardar</button>
                            </div>


                        </form>
                    </div>
                    <!-- Modal footer -->

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