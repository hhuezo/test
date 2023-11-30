@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Listado de Iglesias
            </h4>
            <a href="{{ url('catalog/iglesia/create') }}">
                <button class="btn btn-dark">Nuevo</button>
            </a>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden" style="width: 97%; margin-left: 1%;">
                        <table id="myTable"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th style="text-align: center">Id</th>
                                    <th style="text-align: center">Organizacion</th>
                                    <th style="text-align: center">Direccion</th>
                                    <th style="text-align: center">Contacto</th>
                                    <th style="text-align: center">Estado</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">


                                @if ($iglesia->count() > 0)
                                    @foreach ($iglesia as $obj)
                                        <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <td align="center" class="table-td">
                                                {{ $obj->id }}
                                            </td>
                                            <td align="center" class="table-td">
                                                {{ $obj->name }}
                                            </td>
                                            <td align="center" class="table-td">
                                                {{ $obj->address }}
                                            </td>
                                            <td align="center" class="table-td">
                                                {{ $obj->contact_name }}
                                            </td>
                                            <td align="center" class="table-td">
                                                @foreach ($estatuorg as $obj2)
                                                    @if ($obj2->id == $obj->status_id)
                                                        <option value="{{ $obj2->id }}" selected>
                                                            {{ $obj2->description_es }}
                                                    @endif
                                                @endforeach
                                            <td align="center" class="table-td">
                                                <a href="{{ url('catalog/iglesia') }}/{{ $obj->id }}/edit">
                                                    <iconify-icon icon="mdi:edit-circle" style="color: #1e293b;"  width="40"></iconify-icon>
                                                </a>
                                                &nbsp;&nbsp;
                                                <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;" width="40"  data-bs-toggle="modal"
                                                data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                                {{-- <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                    style="color: #0F172A;" width="40"></iconify-icon> --}}
                                                &nbsp;&nbsp;

                                                <iconify-icon  icon="lets-icons:check-fill" style="color: #1e293b;" width="40" data-bs-toggle="modal"
                                                data-bs-target="#modal-estado-{{ $obj->id }}"></iconify-icon>
                                                {{-- <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-estado-{{ $obj->id }}" icon="mdi:check"
                                                    style="color: #0F172A;" width="40"></iconify-icon> --}}
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
    </script>
@endsection
