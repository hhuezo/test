@extends ('menu')
@section('contenido')

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<div class=" space-y-5">
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Listado de Participantes
            </h4>
            <!--<button class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#usuario_create_modal">Nuevo</button>-->
        </header>
        <div class="card">
            <div style=" margin-left:20px; margin-right:20px; ">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden " style=" margin-bottom:20px ">
                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed black:divide-slate-700" cellspacing="0" width="100%">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr  class="even:bg-slate-50 dark:even:bg-slate-700">
                                    <th style="text-align: center">Id</th>

                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Apellido</th>
                                    <th style="text-align: center">Iglesia</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($miembros_iglesia as $obj)

                                <tr  class="even:bg-slate-50 dark:even:bg-slate-700">

                                    <td align="center">{{ $obj->idusuario }}</td>
                                    <td align="center">{{ $obj->nombre }}</td>
                                    <td align="center">{{ $obj->apellido}}</td>
                                    <td align="center">{{ $obj->iglesia}}</td>
                                    <td align="center">
                                        <a href="{{ url('catalog/Iglesiauser') }}/{{ $obj->idusuario }}/edit">
                                            <iconify-icon icon="mmdi:edit-circle" style="color: #090a0b;" width="40"></iconify-icon>
                                        </a>
                                        &nbsp;&nbsp;
                                        <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->idusuario }}" icon="mdi:delete-circle" style="color: #0c0d0e;" width="40"></iconify-icon>
                                    </td>

                                </tr>


                                @endforeach


                            </tbody>
                        </table>
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
