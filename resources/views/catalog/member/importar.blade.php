@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
    <!-- Basic Inputs -->
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Participantes Agregados

                        <a href="{{ url('catalog/member') }}">
                            <button class="btn btn-dark btn-sm float-right">
                                <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                </iconify-icon>
                            </button>
                        </a>
                    </div>
                    <br>
                </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div style=" margin-left:20px; margin-right:20px; ">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                            <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr class="td-table">
                                        <th style="text-align: left">Nombre</th>
                                        <th style="text-align: left">Dui</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: left">Email</th>
                                        <th style="text-align: center">Nota</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @foreach ($agregados as $obj)
                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <td>{{ $obj[0] }}</td>
                                        <td>{{ $obj[1] }}</td>   
                                        <td>{{ $obj[2] }}</td>
                                        <td>{{ $obj[3] }}</td>   
                                        <td>{{ $obj[4] }}</td>                                   
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
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">Participantes No Agregados

                        <a href="{{ url('administracion/iglesia_plan_estudio') }}">
                            <button class="btn btn-dark btn-sm float-right">
                                <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                </iconify-icon>
                            </button>
                        </a>
                    </div>
                    <br>
                </div>
            </header>
            <div class="card-body px-6 pb-6">
                <div style=" margin-left:20px; margin-right:20px; ">
                    <span class=" col-span-8  hidden"></span>
                    <span class="  col-span-4 hidden"></span>
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden " style=" margin-bottom:20px ">
                            <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr class="td-table">
                                        <th style="text-align: left">Nombre</th>
                                        <th style="text-align: left">Dui</th>
                                        <th style="text-align: center">Telefono</th>
                                        <th style="text-align: left">Email</th>
                                        <th style="text-align: center">Nota</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @foreach ($no_agregados as $obj)
                                    <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                        <td>{{ $obj[0] }}</td>
                                        <td>{{ $obj[1] }}</td>   
                                        <td>{{ $obj[2] }}</td>
                                        <td>{{ $obj[3] }}</td>   
                                        <td>{{ $obj[4] }}</td>                                   
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
</div>



@endsection