@extends ('menu')
@section('contenido')
    <div class=" space-y-5">

        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Organizaciones
                </h4>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table
                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                <thead class=" bg-slate-200 dark:bg-slate-700">
                                    <tr>

                                        <th scope="col" class=" table-th ">Id</th>
                                        <th scope="col" class=" table-th ">Nombre</th>
                                        <th scope="col" class=" table-th ">Telefono</th>
                                        <th scope="col" class=" table-th ">E-mail</th>
                                        <th scope="col" class=" table-th ">Nombre Contacto principal</th>
                                        <th scope="col" class=" table-th ">Cargo contacto principal</th>
                                        <th scope="col" class=" table-th ">Telefono contacto principal</th>
                                        <th scope="col" class=" table-th ">Nombre contacto secundario</th>
                                        <th scope="col" class=" table-th ">Cargo contacto secundario</th>
                                        <th scope="col" class=" table-th ">Telefono contacto secundario</th>
                                        <th scope="col" class=" table-th ">Estado de la Organizacion</th>
                                        <th scope="col" class=" table-th ">Accion</th>

                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                    @foreach ($organizaciones as $obj)
                                        <tr>
                                            <td class="table-td">{{ $obj->id }}</td>
                                            <td class="table-td">{{ $obj->nombre }}</td>
                                            <td class="table-td ">{{ $obj->telefono }}</td>
                                            <td class="table-td ">{{ $obj->user->email }}</td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->contacto_principal }}
                                                </div>
                                            </td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->cargo_contacto_principal }}
                                                </div>
                                            </td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->telefono_contacto_principal }}
                                                </div>
                                            </td>

                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->nombre_contacto_secundario }}
                                                </div>
                                            </td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->cargo_contacto_secundario }}
                                                </div>
                                            </td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->telefono_contacto_secundario }}
                                                </div>
                                            </td>
                                            <td class="table-td ">
                                                <div>
                                                    {{ $obj->estado->nombre }}
                                                </div>
                                            </td>

                                            <td class="table-td ">
                                                <div class="flex space-x-3 rtl:space-x-reverse">

                                                    <a href="{{ url('organizacion') }}/{{ $obj->id }}/edit"
                                                        class="on-default edit-row">
                                                        <button class="action-btn" type="button">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </button>
                                                    </a>
                                                    <a href="{{ url('organizacion') }}/{{ $obj->id }}/"
                                                        class="on-default edit-row">
                                                        <button class="action-btn" type="button">
                                                            <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                        </button>
                                                    </a>
                                                   

                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        @include('organizacion.modal')
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
