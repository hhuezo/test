@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
        <!-- Basic Inputs -->
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Plan de estudio para iglesia

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

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <br>
                @endif
                <form method="POST" action="{{ route('iglesia_plan_estudio.update', $plan->id) }}">
                    @csrf
                    @method('PUT')
                    <br>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Iglesia</label>
                            <select name="iglesia_id" class="form-control" required>
                                @foreach ($iglesias as $obj)
                                    <option value="{{ $obj->id }}" {{ $plan->iglesia_id == $obj->id ? 'selected':''}}>{{ $obj->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Grupo</label>
                            <select name="group_id" class="form-control" required>
                                @foreach ($grupos as $obj)
                                    <option value="{{ $obj->id }}" {{$plan->group_id == $obj->id ? 'selected':''}}>{{ $obj->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Plan de estudio</label>
                            <select name="study_plan_id" class="form-control" required>
                                <option value="" disabled selected>Seleccione</option>
                                @foreach ($planes_estudio as $obj)
                                    <option value="{{ $obj->id }}" {{$plan->study_plan_id == $obj->id ? 'selected':''}}>
                                        {{ $obj->description_es }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Nombre</label>
                            <input type="text" name="name" value="{{ $plan->name }}" required class="form-control">
                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Fecha inicio</label>
                            <input type="date" name="start_date" value="{{ $plan->start_date }}" required
                                class="form-control">
                        </div>


                        <div class="input-area relative">
                            <label for="end_date" class="form-label">Fecha final</label>
                            <input type="date" name="end_date" value="{{ $plan->end_date }}" required class="form-control">
                        </div>

                    </div>
                    <br>
                    <div style="text-align: right;">
                        <button type="submit" class="btn inline-flex justify-center btn-dark">Guardar</button>
                    </div>


                </form>
            </div>
        </div>

    </div>



@endsection
