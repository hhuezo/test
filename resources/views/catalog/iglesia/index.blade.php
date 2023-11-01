@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de Iglesias
                </h4>
                <a href="{{url('catalog/iglesia/create')}}">
                <button class="btn btn-outline-primary" >Nuevo</button>
            </a>
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
                                        <th style="text-align: center">Id</th>
                                        <th style="text-align: center">organizacion</th>
                                        <th style="text-align: center">direccion</th>
                                        <th style="text-align: center">contacto</th>

                                        <th style="text-align: center">opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($iglesia->count() > 0)
                                        @foreach ($iglesia as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->id }}</td>
                                                <td  align="center">{{ $obj->name }}</td>
                                                <td  align="center">{{ $obj->address }}</td>
                                                <td  align="center">{{ $obj->contact_name }}</td>

                                                <td align="center">
                                                    <a href="{{url('catalog/iglesia')}}/{{$obj->id}}/edit">
                                                    <iconify-icon icon="mdi:pencil-box"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                        &nbsp;&nbsp;
                                                        <a href="{{url('catalog/iglesia')}}/{{$obj->id}}">
                                                            <iconify-icon icon="mdi:printer"
                                                                style="color: #1769aa;" width="40"></iconify-icon>
                                                        </a>
                                                </td>
                                            </tr>
                                            @include('catalog/iglesia/modal')
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
