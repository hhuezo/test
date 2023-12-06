@extends('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Planes de estudio para iglesias
            </h4>
            <a href="{{ url('administracion/iglesia_plan_estudio/create') }}">
                <button class="btn btn-dark">Nuevo</button>
            </a>
        </header>
        <div class="card-body px-6 pb-6">
            <div style=" margin-left:20px; margin-right:20px; ">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden " style=" margin-bottom:20px ">

                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead>
                                <tr class="td-table" align="left">
                                    <th>Iglesia</th>
                                    <th>Grupo</th>
                                    <th>Plan de estudio</th>
                                    <th>Fecha inicio</th>
                                    <th>Fecha final</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($planes as $obj)
                                    <tr>
                                        <td>{{ $obj->iglesia ? $obj->iglesia->name : '' }}</td>
                                        <td>{{ $obj->grupo ? $obj->grupo->nombre : '' }}</td>
                                        <td>{{ $obj->plan_estudio ? $obj->plan_estudio->description_es : '' }}</td>
                                        <td>{{ $obj->start_date ? date('d/m/Y', strtotime($obj->start_date)) : '' }}</td>
                                        <td>{{ $obj->end_date ? date('d/m/Y', strtotime($obj->end_date)) : '' }}</td>
                                        </td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a
                                                    href="{{ url('administracion/iglesia_plan_estudio') }}/{{ $obj->id }}/edit">
                                                    <iconify-icon icon="mdi:edit-circle" style="color: #1e293b;"
                                                        width="40"></iconify-icon>
                                                </a>

                                                &nbsp;&nbsp;
                                                <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;"
                                                    width="40" data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('administracion.iglesia_plan_estudio.modal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
