
@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class=" space-y-5">
        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de usuarios
                </h4>
                <button class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#usuario_create_modal">Nuevo</button>
            </header>
            <div class="card">
                <div style=" margin-left:20px; margin-right:20px; ">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Id</th>
                                        <th>Email</th>
                                        <th>Nombre</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($usuarios->count() > 0)
                                        @foreach ($usuarios as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->id }}</td>
                                                <td>{{ $obj->email }}</td>
                                                <td>{{ $obj->name }}</td>
                                                <td align="center">

                                                    <a href="{{ url('seguridad/role') }}/{{ $obj->id }}/edit">
                                                        <iconify-icon icon="healthicons:eye-negative" style="color: #1769aa;" width="40"></iconify-icon>
                                                    </a>

                                                    &nbsp;&nbsp;



                                                </td>
                                            </tr>
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
