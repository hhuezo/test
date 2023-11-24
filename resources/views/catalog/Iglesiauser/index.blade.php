@extends ('menu')
@section('contenido')

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<div class=" space-y-5">
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Listado de usuarios
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
                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th style="text-align: center">Id</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                <tr>
                                    @if ($usuarios->count() > 0)
                                    @foreach ($usuarios as $obj)
                                    @foreach ($members as $obj2)
                                    @if ($obj->id==$obj2->users_id)
                                    <td align="center">{{ $obj->id }}</td>
                                    <td align="center">{{ $obj->email }}</td>
                                    <td align="center">{{ $obj->name }}</td>

                                    <td align="center">
                                        <a href="{{ url('catalog/Iglesiauser') }}/{{ $obj->id }}/edit">
                                            <iconify-icon icon="mdi:pencil" style="color: #1769aa;" width="40"></iconify-icon>
                                        </a>
                                        &nbsp;&nbsp;
                                        <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash" style="color: #1769aa;" width="40"></iconify-icon>
                                    </td>
                                    @endif

                                    @endforeach
                                    @endforeach
                                    @endif
                                </tr>


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