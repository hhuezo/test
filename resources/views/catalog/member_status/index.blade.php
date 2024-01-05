@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Estado de los Participantes
                </h4>
                <a href="{{url('catalog/member_status/create')}}">
                <button class="btn btn-outline-primary" >Nuevo</button>
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
                                    <tr  class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <th style="text-align: center">Id</th>
                                        <th style="text-align: center">Descripcion</th>

                                        <th style="text-align: center">Fecha</th>

                                        <th style="text-align: center">Estatus</th>
                                        <th style="text-align: center">opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @if ($MemberStatus->count() > 0)
                                        @foreach ($MemberStatus as $obj)
                                            <tr  class="even:bg-slate-50 dark:even:bg-slate-700">
                                                <td align="center">{{ $obj->id }}</td>
                                                <td align="center">{{ $obj->description}}</td>

                                                <td align="center"> {{ date('d/m/Y', strtotime($obj->adding_date)) }}</td>

                                                <td align="center">{{ $obj->status}}</td>
                                                <td align="center">
                                                    <a href="{{url('catalog/member_status')}}/{{$obj->id}}/edit">
                                                    <iconify-icon icon="mdi:edit-circle"
                                                        style="color: #0c0c0c;" width="40"></iconify-icon>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:delete-circle"
                                                        style="color: #121213;" width="40"></iconify-icon>
                                                </td>
                                            </tr>
                                            @include('catalog/member_status/modal')
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
