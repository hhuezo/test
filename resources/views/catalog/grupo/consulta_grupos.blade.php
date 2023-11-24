@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de Participantes de Grupos de la iglesia : {{ $iglesia->name }}
                </h4>
                <div style="text-align: right;">


                <a href="{{ url('iglesia/datos_iglesia') }}">
                    <button class="btn btn-dark btn-sm float-right">
                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                        </iconify-icon>
                    </button>
                </a>
            </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">

                                    <tr class="td-table">
                                        <th style="text-align: center">id</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Apellido</th>
                                        <th style="text-align: center">Grupo</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($miembros as $obj)
                                            <tr>
                                                    <td  align="center">{{ $obj->member_id }}</td>
                                                    <td  align="center">{{ $obj->name_member }}</td>
                                                    <td  align="center">{{ $obj->lastname_member }}</td>
                                                    <td  align="center">{{ $obj->nombre_grupo }}</td>
                                                    <td align="center">
                                                        <a href="{{ url('reasigna_grupos') }}/{{ $obj->member_id }}">
                                                            <iconify-icon icon="mdi:pencil" style="color: #1769aa;" width="40"></iconify-icon>
                                                        </a></td>

                                            </tr>

                                        @endforeach


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
