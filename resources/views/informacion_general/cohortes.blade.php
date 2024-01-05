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
            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                Cohortes
            </li>

        </ul>
    </div>


    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">

        @foreach ($cohortes as $cohorte)
            <div class="card ring-1 ring-danger-500">
                <div class="card-body p-6">
                    <div class="flex-1 items-center">
                        <div class="card-title mb-5">{{ $cohorte->nombre }}</div>
                        <p class="card-text">Número de sedes: {{ $cohorte->sedes->count() }}</p>
                    </div>
                </div>
                <div class="card-footer flex items-center justify-end p-4">
                    @if ($cohorte->sedes->count() > 0)
                        <a href="{{ url('informacion_general/get_sedes') }}/{{ $cohorte->id }}">
                            <button class="btn btn-info">Ver información</button>
                        </a>
                    @endif

                </div>
            </div>
        @endforeach


    </div>
@endsection
