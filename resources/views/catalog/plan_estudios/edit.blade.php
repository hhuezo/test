@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Modificar plan de estudio

                            <a href="{{ url('catalog/plan_estudios') }}">
                                <button class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                    </div>
                </header>


                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">
                        <div class="space-y-5">
                            <div class="grid grid-cols-12 gap-5">

                                <div class="xl:col-span-12 col-span-12 lg:col-span-12">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ route('plan_estudios.update', $plan_estudio->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-7">
                                            <div class="input-area relative">&nbsp;
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Descripción</label>
                                                <input type="text" name="description" id="description" required class="form-control" value="{{ $plan_estudio->description }}" autofocus="true">
                                            </div>
                                            &nbsp;
                                        </div>
                                        <br>
                                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-7">
                                            <div class="input-area relative">&nbsp;
                                            </div>
                                            <div class="input-area relative">
                                                <div style="text-align: right;">
                                                    <button type="submit" class="btn inline-flex justify-center btn-dark">{{ 'Aceptar' }}</button>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Agregar tema

                            <a href="" data-bs-toggle="modal" data-bs-target="#modal-createcourse-{{ $plan_estudio->id }}">
                                <button class="btn btn-dark btn-sm float-right">
                                    Agregar Temas
                                </button>
                            </a>
                        </div>
                    </div>
                </header>


                <div class="transition-all duration-150 container-fluid" id="page_layout">
                    <div id="content_layout">
                        <div class="space-y-5">
                            <div class="grid grid-cols-12 gap-5">

                                <div class="xl:col-span-12 col-span-12 lg:col-span-12">

                                    &nbsp;&nbsp;
                                    <div class="input-area relative">
                                        <table id="myTable" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" cellspacing="0" width="100%">
                                            <thead class="bg-slate-200 dark:bg-slate-700">
                                                <tr class="even:bg-slate-50 dark:even:bg-slate-700">


                                                    <th style="text-align: left">Tema</th>
                                                    <th style="text-align: left">Descripción</th>
                                                    <th style="text-align: center">Opciones</th>

                                                </tr>
                                            </thead>
                                            <tbody class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                                @foreach ($plandetalle as $obj)

                                                <td>{{ $obj->name }}</td>
                                                <td>{{ $obj->description }}</td>
                                                <td align="center"> <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-delcourse-{{ $obj->id}}" icon="mdi:delete-circle" style="color: #0e0f10;" width="40"></iconify-icon>

                                                </td>
                                                </tr>
                                                @include('catalog.plan_estudios.del_curso')

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                @include('catalog.plan_estudios.add_curso')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
