@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Listado de Iglesias
            </h4>
            <div align="rigth">

                <button class="btn btn-outline-dark" onclick="rechazadas()" id="btn_rechazadas"><iconify-icon
                        icon="ic:outline-church" width="16"></iconify-icon> &nbsp;Iglesias Rechazadas</button>
                <button class="btn btn-outline-dark" onclick="aceptadas()" id="btn_aceptadas"
                    style="display: none;"><iconify-icon icon="ic:outline-church" width="16"></iconify-icon>
                    &nbsp;Iglesias Aceptadas</button>

            <a href="{{ url('catalog/iglesia/create') }}">
                <button class="btn btn-dark">Nuevo</button>
            </a>
        </div>
    </header>
    <div class="card-body px-6 pb-6" id="aceptadas" style="display: block;">
        <div class="overflow-x-auto -mx-6">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden" style="width: 97%; margin-left: 1%;">
                    <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th style="text-align: center">sede</th>
                                <th style="text-align: center">cohorte</th>
                                <th style="text-align: center">Iglesia</th>
                                <th style="text-align: center">Dirección</th>
                                <th style="text-align: center">Contacto</th>
                                <th style="text-align: center">Estado</th>
                                <th style="text-align: center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">


                            @if ($iglesia->count() > 0)
                            @foreach ($iglesia as $obj)
                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                <td align="center" class="table-td">{{ $obj->sedeiglesia->nombre }}</td>
                                <td align="center" class="table-td">
                                    {{ $obj->sedeiglesia->cohorte->nombre}}
                                   </td>

                                <td align="center" class="table-td">{{ $obj->name }}</td>
                                <td align="center" class="table-td">{{ $obj->address }}</td>
                                <td align="center" class="table-td">{{ $obj->contact_name }}</td>
                                <td align="center" class="table-td">{{ $obj->iglesia_estatus->description_es}} </td>
                                <td align="center" class="table-td">
                                    <a href="{{ url('catalog/iglesia') }}/{{ $obj->id }}/edit">
                                        <iconify-icon icon="mdi:edit-circle" style="color: #1e293b;" width="40"></iconify-icon>
                                    </a>
                                    &nbsp;&nbsp;
                                    <a href="{{ url('iglesia/reporte_asistencias/') }}/{{ $obj->id }}">
                                        <iconify-icon icon="material-symbols:location-home" style="color: #1e293b;" width="40"></iconify-icon>
                                    </a>
                                    &nbsp;&nbsp;

                                    <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;" width="40" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                    &nbsp;&nbsp;
                                    @if($obj->status_id != 2)
                                    <iconify-icon icon="lets-icons:check-fill" style="color: #1e293b;" width="40" data-bs-toggle="modal" data-bs-target="#modal-estado-{{ $obj->id }}"></iconify-icon>
                                    @endif
                                    &nbsp;&nbsp;

                                </td>
                            </tr>
                            @include('catalog.iglesia.modal')
                            @include('catalog.iglesia.modal_estado')
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card-body px-6 pb-6" id="rechazadas" style="display: none;">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden" style="width: 97%; margin-left: 1%;">
                        <table id="myTable2"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th style="text-align: center">Iglesia</th>
                                    <th style="text-align: center">Dirección</th>
                                    <th style="text-align: center">Contacto</th>
                                    <th style="text-align: center">Estado</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">


                                @if ($iglesias_rechazadas->count() > 0)
                                    @foreach ($iglesias_rechazadas as $obj)
                                        <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <td align="center" class="table-td">{{ $obj->name }}</td>
                                            <td align="center" class="table-td">{{ $obj->address }}</td>
                                            <td align="center" class="table-td">{{ $obj->contact_name }}</td>
                                            <td align="center" class="table-td">
                                                @foreach ($estatuorg as $obj2)
                                                    @if ($obj2->id == $obj->status_id)
                                                        <option value="{{ $obj2->id }}" selected>
                                                            {{ $obj2->description_es }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td align="center" class="table-td">
                                                <a href="{{ url('catalog/iglesia') }}/{{ $obj->id }}/edit">
                                                    <iconify-icon icon="mdi:edit-circle" style="color: #1e293b;"
                                                        width="40"></iconify-icon>
                                                </a>
                                                &nbsp;&nbsp;
                                                <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;"
                                                    width="40" data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                                &nbsp;&nbsp;

                                                <iconify-icon icon="lets-icons:check-fill" style="color: #1e293b;"
                                                    width="40" data-bs-toggle="modal"
                                                    data-bs-target="#modal-estado-{{ $obj->id }}"></iconify-icon>
                                                &nbsp;&nbsp;
                                            </td>
                                        </tr>
                                        @include('catalog.iglesia.modal')
                                        @include('catalog.iglesia.modal_estado')
                                    @endforeach
                                @endif
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

        function rechazadas() {
            $("#aceptadas").hide();
            $("#rechazadas").show();
            $("#btn_rechazadas").hide();
            $("#btn_aceptadas").show();
        }

        function aceptadas() {
            $("#aceptadas").show();
            $("#rechazadas").hide();
            $("#btn_rechazadas").show();
            $("#btn_aceptadas").hide();
        }
    </script>
@endsection
