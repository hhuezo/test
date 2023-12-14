@extends ('menu')
@section('contenido')

@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



<div class="card">
    <header class=" card-header noborder">
        <h4 class="card-title">Planes de Estudio
        </h4>
        <a href="{{url('catalog/plan_estudios/create')}}">
            <button class="btn btn-dark">Nuevo</button>
        </a>
    </header>
    <div class="card-body px-6 pb-6">
        <div style=" margin-left:20px; margin-right:20px; ">
            <span class=" col-span-8  hidden"></span>
            <span class="  col-span-4 hidden"></span>
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden " style=" margin-bottom:20px ">

                    <div class="input-area relative">
                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">

                               
                                    <th style="text-align: left; ">Descripción</th>
                                    <th style="text-align: left">Temas</th>
                                    <th style="text-align: center">Opciones</th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 black:bg-slate-800 black:divide-slate-700">
                                @if ($plan_estudio->count() > 0)
                                @foreach ($plan_estudio as $obj)
                                <tr class="even:bg-slate-50 black:even:bg-slate-700">
                              
                                    <td style="vertical-align: top;">{{ $obj->description_es }}</td>
                                    <td>
                                        @foreach($obj->detalles as $tem)
                                            <li>{{$tem->curso->name}}</li>
                                        @endforeach
                                    </td>
                                    <td align="center">
                                        <a href="{{url('catalog/plan_estudios')}}/{{$obj->id}}/edit">
                                            <iconify-icon icon="mdi:pencil-circle" style="color: #1e293b;" width="37"></iconify-icon>
                                        </a>
                                        &nbsp;&nbsp;
                                        <iconify-icon icon="mdi:delete-circle" style="color: #1e293b;" width="40" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>
                                    </td>
                                </tr>
                                @include('catalog/plan_estudios/modal')
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