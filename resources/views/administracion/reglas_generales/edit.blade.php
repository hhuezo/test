@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar Reglas

                                <a href="{{ url('administracion/reglas_generales')}}">
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

                                            <form method="POST" action="{{ url('administracion.reglas_generales.update', $ReglasGenerales->id) }}">
                                                @method('PUT')
                                                @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Nombre</label>
                                                    <input type="text" name="rule_name" id="rule_name" required class="form-control"
                                                        value="{{$ReglasGenerales->rule_name }}" autofocus="true">
                                                </div>

                                                    <div class="input-area relative">
                                                        <label for="largeInput"
                                                            class="form-label">Abreviatura</label>
                                                        <input type="text" name="abbrev" id="abbrev" required class="form-control"
                                                            value="{{$ReglasGenerales->abbrev }}" autofocus="true">
                                                    </div>

                                                    <div class="input-area relative">
                                                        <label for="largeInput"
                                                            class="form-label">Cuantificado</label>
                                                        <input type="text" name="quantity" id="quantity" required class="form-control"
                                                            value="{{$ReglasGenerales->quantity }}" autofocus="true">
                                                    </div>


                                                &nbsp;
                                            </div>
                                            <div style="text-align: right;">
                                                <button type="submit"
                                                    class="btn inline-flex justify-center btn-dark">Aceptar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
