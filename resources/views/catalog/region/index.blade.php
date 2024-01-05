@extends ('menu')
@section('contenido')

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">Region
        </h4>
        <a href="{{url('catalog/region/create')}}">
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
                            <tr  class="even:bg-slate-50 dark:even:bg-slate-700">

                                <td style="text-align: center">Id</td>
                                <td style="text-align: center">Nombre</td>
                                <td style="text-align: center">Opciones</td>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @if ($region->count() > 0)
                            @foreach ($region as $obj)
                            <tr  class="even:bg-slate-50 dark:even:bg-slate-700">
                                <td align="center">{{ $obj->id }}</td>
                                <td align="center">{{ $obj->nombre }}</td>
                                <td align="center">
                                    <a href="{{url('catalog/region')}}/{{$obj->id}}/edit">
                                        <iconify-icon icon="mdi:edit-circle" style="color:black;" width="40"></iconify-icon>
                                    </a>
                                    &nbsp;&nbsp;
                                    <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:delete-circle" style="color: black;" width="40"></iconify-icon>
                                </td>
                            </tr>
                            @include('catalog.region.modal')
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
    function modal_edit(id, nombre) {
        //alert(id);
        document.getElementById('id').value = id;
        document.getElementById('nombre').value = nombre;
        $('#usuario_edit_modal').modal('show');
    };
</script>

@endsection
