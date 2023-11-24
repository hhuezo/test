@extends ('menu')
@section('contenido')

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



        <div class="card">
            <header class=" card-header noborder">
                <h4 class="card-title">Listado de Grupos
                </h4>
                <a href="{{url('catalog/grupo/create')}}">
                <button class="btn btn-outline-primary" >Nuevo</button>
            </a>
            </header>
            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">

                                    <tr class="td-table">
                                        <th style="text-align: center">Id</th>
                                        <th style="text-align: center">grupo</th>
                                        <th style="text-align: center">opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @if ($grupos->count() > 0)
                                        @foreach ($grupos as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->id }}</td>
                                                <td  align="center">{{ $obj->nombre }}</td>

                                                <td align="center">
                                                    {{--<a href="{{url('catalog/grupo')}}/{{$obj->id}}/edit">
                                                    <iconify-icon icon="mdi:pencil-box"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                    </a>--}}
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                </td>
                                            </tr>
                                            @include('catalog/grupo/modal')
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
