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
                            <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700"  cellspacing="0" width="100%">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr class="td-table">
                                        <th style="text-align: center">Id</th>
                                        <th style="text-align: center">Organizacion</th>
                                        <th style="text-align: center">Direccion</th>
                                        <th style="text-align: center">Contacto</th>
                                        <th style="text-align: center">Estado</th>
                                        <th style="text-align: center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @if ($iglesia->count() > 0)
                                        @foreach ($iglesia as $obj)
                                            <tr>
                                                <td align="center">{{ $obj->id }}</td>
                                                <td  align="center">{{ $obj->name }}</td>
                                                <td  align="center">{{ $obj->address }}</td>
                                                <td  align="center">{{ $obj->contact_name }}</td>
                                                <td  align="center">
                                                    @foreach ($estatuorg as $obj2)
                                                @if ($obj2->id == $obj->status_id)
                                                    <option value="{{ $obj2->id }}" selected>
                                                        {{ $obj2->description_es }}
                                                @endif
                                            @endforeach
                                                <td align="center">
                                                    <a href="{{url('catalog/iglesia')}}/{{$obj->id}}/edit">
                                                    <iconify-icon icon="mdi:pencil"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                    </a>
                                                    &nbsp;&nbsp;
                                                    <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                        &nbsp;&nbsp;
                                                        <iconify-icon data-bs-toggle="modal"
                                                        data-bs-target="#modal-estado-{{ $obj->id }}" icon="mdi:check"
                                                        style="color: #1769aa;" width="40"></iconify-icon>
                                                        &nbsp;&nbsp;

                                </td>
                            </tr>
                            @include('catalog/iglesia/modal')
                            @include('catalog/iglesia/modal_estado')
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
