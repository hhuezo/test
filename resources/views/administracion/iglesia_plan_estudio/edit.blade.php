@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
        <!-- Basic Inputs -->
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex items-center border-b border-slate-100 black:border-slate-700">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 black:text-white">Plan de estudio para iglesia

                            <a href="{{ url('administracion/iglesia_plan_estudio') }}">
                                <button class="btn btn-black btn-sm float-right">
                                    <iconify-icon icon="icon-park-solid:black" style="color: white;" width="18">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                        <br>
                    </div>

                </header>

                <div class="card-text h-full ">
                    <div>
                        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                            id="tabs-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-home"
                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                    id="tabs-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-home" role="tab"
                                    aria-controls="tabs-home" aria-selected="true">General</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-profile"
                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                    id="tabs-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile"
                                    role="tab" aria-controls="tabs-profile" aria-selected="false">Participantes</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-messages"
                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                    id="tabs-messages-tab" data-bs-toggle="pill" data-bs-target="#tabs-messages"
                                    role="tab" aria-controls="tabs-messages" aria-selected="false">Cursos</a>
                            </li>
                            {{--    <li class="nav-item" role="presentation">
                                <a href="#tabs-settings"
                                    class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                    id="tabs-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#tabs-settings" role="tab"
                                    aria-controls="tabs-settings"
                                    aria-selected="false">settings</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content" id="tabs-tabContent">
                            <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                                aria-labelledby="tabs-home-tab">


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
                                                    <option value="{{ $obj->id }}"
                                                        {{ $plan->iglesia_id == $obj->id ? 'selected' : '' }}>
                                                        {{ $obj->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Grupo</label>
                                            <select name="group_id" class="form-control" required>
                                                @foreach ($grupos as $obj)
                                                    <option value="{{ $obj->id }}"
                                                        {{ $plan->group_id == $obj->id ? 'selected' : '' }}>
                                                        {{ $obj->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Plan de estudio</label>
                                            <select name="study_plan_id" class="form-control" required>
                                                <option value="" disabled selected>Seleccione</option>
                                                @foreach ($planes_estudio as $obj)
                                                    <option value="{{ $obj->id }}"
                                                        {{ $plan->study_plan_id == $obj->id ? 'selected' : '' }}>
                                                        {{ $obj->description_es }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Nombre</label>
                                            <input type="text" name="name" value="{{ $plan->name }}" required
                                                class="form-control">
                                        </div>

                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Fecha inicio</label>
                                            <input type="date" name="start_date" value="{{ $plan->start_date }}"
                                                required class="form-control">
                                        </div>


                                        <div class="input-area relative">
                                            <label for="end_date" class="form-label">Fecha final</label>
                                            <input type="date" name="end_date" value="{{ $plan->end_date }}" required
                                                class="form-control">
                                        </div>

                                    </div>
                                    <br>
                                    <div style="text-align: right;">
                                        <button type="submit"
                                            class="btn inline-flex justify-center btn-dark">Guardar</button>
                                    </div>


                                </form>


                            </div>
                            <div class="tab-pane fade" id="tabs-profile" role="tabpanel"
                                aria-labelledby="tabs-profile-tab">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                        <div class="inline-block min-w-full align-middle">
                                            <div class="overflow-hidden ">
                                                <table
                                                    class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                                        <tr>

                                                            <th scope="col" class=" table-th ">
                                                                Nombre
                                                            </th>

                                                            <th scope="col" class=" table-th ">
                                                                Grupo
                                                            </th>



                                                        </tr>
                                                    </thead>
                                                    <tbody
                                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                                        @foreach ($participantes as $participante)
                                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                                <td class="table-td">
                                                                    {{ $participante->nombre }}</td>
                                                                <td class="table-td">
                                                                    {{ $participante->grupo }}</td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs-messages" role="tabpanel"
                                aria-labelledby="tabs-messages-tab">
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Nombre
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                        @foreach ($cursos as $obj)
                                            <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                                <td class="table-td">
                                                    {{ $obj->curso ? $obj->curso->name_es : '' }}
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            {{--  <div class="tab-pane fade" id="tabs-settings" role="tabpanel"
                                aria-labelledby="tabs-settings-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-200">
                                    This is some placeholder content the
                                    <strong>Settings</strong>
                                    tab's associated content. Clicking another tab will
                                    toggle the visibility of this one for the next. The tab
                                    JavaScript swaps classes to control the content
                                    visibility and styling. consectetur adipisicing elit. Ab
                                    ipsa!
                                </p>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>







    </div>



@endsection
