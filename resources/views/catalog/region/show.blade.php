@extends ('menu')
@section('contenido')


<div class="grid grid-cols-12 gap-5">
    <div class="lg:col-span-12 col-span-12 space-y-5">

        @foreach ($region->cohortes as $cohort)
        <div class="card p-6">
            <div class="card-title">{{$cohort->nombre}}</div>
            <div class="grid grid-cols-12 gap-5">

            </div>
        </div>
        @endforeach

    </div>

</div>



@endsection
