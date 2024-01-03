@extends ('menu')
@section('contenido')
<div class="grid grid-cols-12 gap-5 mb-5">
    @php($validar_sesiones = 0)
    @php($total_sesiones = 0)
    @foreach($planes as $plan)
        @php($total_sesiones = $total_sesiones + $plan->sesiones->count())
        @php($validar_sesiones = $validar_sesiones +  $plan->sesiones->where('completed','=',1)->count()) 
    @endforeach
    @if($validar_sesiones == $total_sesiones)
    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
            <label class="card-title">Certificación de Iglesia</label>
                <div class="flex-1">
                    
                    <div class="card-title text-slate-900 dark:text-white" align="right" style="margin-top: -25px;">
                        @if($iglesia->validar_asistencias($iglesia->id) >= 13 && $iglesia->validar_asistencias_jovenes($iglesia->id) == 0)
                        <a href="{{url('administracion/iglesia_plan_estudio/certificado')}}/{{$iglesia->id}}" class="btn btn-success">Certificación de Iglesia</a>
                        @else
                        <a href="{{url('administracion/iglesia_plan_estudio/certificado_participante')}}/{{$iglesia->id}}" class="btn btn-success">Certificación de Participantes</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    @else
    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
            <label class="card-title">Certificación de Iglesia</label>
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white" align="center" style="margin-top: -25px;">
                       <label class="btn btn-outline-danger">Falta Completar Sesiones</label> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @foreach ($planes as $plan)

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">{{ $plan->grupo->nombre }}

                        </div>
                    </div>
                </header>

                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">
                        <div class="space-y-5">
                            <div class="grid grid-cols-12 gap-5">

                                <div class="xl:col-span-12 col-span-12 lg:col-span-6">


                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                        <thead class="bg-slate-200 dark:bg-slate-700">
                                            <tr>
                                                <th scope="col" class=" table-th ">
                                                    Sesion
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Temas
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Asistencias por <br> Participantes
                                                </th>
                                                <th scope="col" class=" table-th ">
                                                    Completada
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                            @foreach ($plan->sesiones as $sesion)
                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                <td class="table-td">{{ $sesion->session_name }}</td>
                                                <td class="table-td">{{ implode(', ', $sesion->detalles->pluck('curso.name_es')->toArray()) }} </td>
                                                <td class="table-td">{{ $sesion->asistencias->where('attended','=',1)->count()}}/{{ $sesion->asistencias->count()}} </td>
                                                <td class="table-td " >
                                                    <div class="checkbox-area">
                                                        <label class="inline-flex items-center cursor-pointer">
                                                            <input type="checkbox" class="hidden" name="checkbox" {{ $sesion->completed == 1 ? 'checked' : '' }}>
                                                            <span class="h-4 w-4 border flex-none border-slate-100 dark:border-slate-800 rounded inline-flex ltr:mr-3 rtl:ml-3 relative transition-all duration-150 bg-slate-100 dark:bg-slate-900">
                                                                <img src="{{asset('assets/images/icon/ck-white.svg')}}" alt="" class="h-[10px] w-[10px] block m-auto opacity-0"></span>

                                                        </label>
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
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection