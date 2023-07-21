@extends('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Verificación de miembros
            </h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div style=" margin-left:20px; margin-right:20px; ">
                <span class=" col-span-8  hidden"></span>
                <span class="  col-span-4 hidden"></span>
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden " style=" margin-bottom:20px ">

                        <table id="myTable" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr class="td-table">
                                    <th>Nombre</th>
                                    <th>Documento</th>
                                    <th>Fecha nacimiento</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($members as $obj)
                                    <tr>
                                        <td>{{ $obj->name_member }} {{$obj->lastname_member}}</td>
                                        <td class="table-td ">{{ $obj->document_number }}</td>
                                        <td>{{ date('d/m/Y', strtotime($obj->birthdate)) }}</td>
                                        <td>{{$obj->email}}</td>
                                        <td>{{$obj->cell_phone_number}}</td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse">

                                                <a href="{{ url('member') }}/{{ $obj->id }}/edit"
                                                    class="on-default edit-row">
                                                    <button class="action-btn" type="button">
                                                        <iconify-icon icon="mdi:pencil-box" style="color: #1769aa;" width="40"></iconify-icon>
                                                             </button>
                                                </a>
                                                {{-- <a href="{{ url('organization') }}/{{ $obj->id }}/"
                                                    class="on-default edit-row">
                                                    <button class="action-btn btn-danger" type="button">
                                                        <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                    </button>
                                                </a> --}}
                                            </div>
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
@endsection
