@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">Documentos por Curso
        </h4>
        <a href="{{ url('catalog/FilePerCourse/create') }}">
            <button class="btn btn-outline-primary">Nuevo</button>
        </a>
    </header>
    <div class="card-body px-6 pb-6">
        <div style=" margin-left:20px; margin-right:20px; ">
            <span class=" col-span-8  hidden"></span>
            <span class="  col-span-4 hidden"></span>
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden " style=" margin-bottom:20px ">
                    <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                <th style="text-align: center">Id</th>
                                <th>Identificacion_del_curso</th>
                                <th>Ruta</th>
                                <th>Archivo</th>
                                <th>fecha_creacion</th>
                                <th style="text-align: center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($Fcourse->count() > 0)
                            @foreach ($Fcourse as $obj)
                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                <td align="center">{{ $obj->id }}</td>

                                @if ($obj->course)
                                <td>{{$obj->course->name_es}}</td>
                                @else
                                <td></td>
                                @endif

                                <td>{{ $obj->route}}</td>
                                <td> {{ $obj->name}} </td>
                                <td>{{ date('d/m/Y', strtotime( $obj->created_at )) }} </td>
                                <td align="center">
                                    <a href="{{ url('catalog/FilePerCourse') }}/{{ $obj->id }}/edit">
                                        <iconify-icon icon="mdi:pencil" style="color: black;" width="40"></iconify-icon>
                                    </a>
                                    &nbsp;&nbsp;
                                    <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash" style="color: black;" width="40"></iconify-icon>
                                </td>
                            </tr>
                            @include('catalog.file_course.modal')
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
