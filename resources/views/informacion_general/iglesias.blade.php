@extends('menu')
@section('contenido')
    <div class="mb-5">
        <ul class="m-0 p-0 list-none">
            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                <a href="{{ url('informacion_general') }}">
                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
            </li>

            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                <a href="{{ url('informacion_general/get_cohortes') }}/{{ $sede->cohorte->region_id }}">
                    Cohortes
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
            </li>
            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                <a href="{{ url('informacion_general/get_sedes') }}/{{ $sede->cohorte->region_id }}">
                    Sede
                    <iconify-icon icon="heroicons-outline:chevron-right"
                        class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                </a>
            </li>
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Iglesia
            </li>

        </ul>
    </div>


    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">

        @foreach ($iglesias as $iglesia)
            <div class="card ring-1 ring-danger-500">
                <div class="card-body p-6">
                    <div class="flex-1 items-center">
                        <div class="card-title mb-5">{{ $iglesia->name }}</div>
                        <p class="card-text">Número de participantes: {{ $iglesia->participantes($iglesia->id)->count() }}
                        </p>
                    </div>
                </div>
                <div class="card-footer flex items-center justify-end p-4">
                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">
                            <tr>
                                <th scope="col" class=" table-th ">Nombre</th>
                                <th scope="col" class=" table-th ">Grupo</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @php($i=1)
                            @foreach ($iglesia->participantes($iglesia->id) as $participante)
                                <tr>
                                    <td>{{$i}}. {{ $participante->nombre }}</td>
                                    <td>{{ $participante->grupo }}</td>
                                </tr>
                                @php($i++)
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach


    </div>
@endsection
