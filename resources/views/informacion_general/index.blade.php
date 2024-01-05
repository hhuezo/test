@extends('menu')
@section('contenido')
    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-5">
        @foreach ($regiones as $region)
            <div class="card ring-1 ring-danger-500">
                <div class="card-body p-6">
                    <div class="flex-1 items-center">
                        <div class="card-title mb-5">{{ $region->nombre }}</div>
                        <p class="card-text">Número de cohortes: {{ $region->cohortes->count() }}</p>
                    </div>
                </div>
                <div class="card-footer flex items-center justify-end p-4">
                    @if ($region->cohortes->count() > 0)
                        <a href="{{ url('informacion_general/get_cohortes/') }}/{{ $region->id }}">
                            <button class="btn btn-info">Ver información</button>
                        </a>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
@endsection
