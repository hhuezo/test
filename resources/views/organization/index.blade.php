@extends('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Verificación de organizaciones
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
                                    <th>Organización</th>
                                    <th>Teléfono</th>
                                    <th>Contacto principal</th>
                                    <th>Telefono contacto principal</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($organizations as $obj)
                                    <tr>
                                        <td>{{ $obj->user_name }}</td>
                                        <td>{{ $obj->name }}</td>
                                        <td class="table-td ">{{ $obj->phone_number }}</td>
                                        <td>{{$obj->contact_name}}</td>
                                        <td>{{$obj->contact_phone_number}}</td>
                                        </td>
                                        <td>
                                            <div class="flex space-x-3 rtl:space-x-reverse">

                                                <a href="{{ url('organization') }}/{{ $obj->id }}/edit"
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
