@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Reglas generales
            </h4>
            <a href="{{ url('administracion/reglas_generales/create') }}">
                <button class="btn btn-outline-primary">Nuevo</button>
            </a>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                    <th style="text-align: center">Id</th>
                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Abreviatura</th>
                                    <th style="text-align: center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @if ($ReglasGenerales->count() > 0)
                                    @foreach ($ReglasGenerales as $obj)
                                        <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <td align="center">{{ $obj->id }}</td>
                                            <td align="center">{{ $obj->rule_name }}</td>
                                            <td align="center">{{ $obj->abbrev }}</td>
                                            <td align="center">
                                                <a
                                                    href="{{ url('administracion/reglas_generales') }}/{{ $obj->id }}/edit">
                                                    <iconify-icon icon="mdi:pencil-circle" class="success"
                                                        width="40"></iconify-icon>
                                                </a>
                                                &nbsp;&nbsp;
                                                <iconify-icon data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-{{ $obj->id }}"
                                                    icon="mdi:delete-circle" class="danger" width="40"></iconify-icon>
                                            </td>
                                        </tr>
                                        @include('administracion.reglas_generales.modal')
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
