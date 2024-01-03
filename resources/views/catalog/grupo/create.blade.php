@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])



<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Crear Grupos
                            <a href="{{ url('catalog/grupo') }}">
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
                                <div class="xl:col-span-2 col-span-12 lg:col-span-3 ">
                                    <div class="card p-6 h-full">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="xl:col-span-8 col-span-12 lg:col-span-6">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form method="POST" action="{{ url('catalog/grupo') }}">
                                        @csrf
                                        <div class="card h-full">
                                            <div class="grid pt-4 pb-3 px-4">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Nombre de Grupo</label>
                                                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required class="form-control">
                                                </div>
                                                <p>
                                              <!--   <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Iglesias</label>
                                                    <select name="_id" class="form-control">
                                                        @foreach ($iglesia as $obj)
                                                        <option value="{{ $obj->id }}">{{ $obj->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </p>
                                                <div class="input-area relative">
                                                        <label for="largeInput" class="form-label"> &nbsp;</label>
                                                        <input type="checkbox" name="correct_answer" value="1">
                                                        Respuesta Correcta
                                                    </div> -->
                                            </div>
                                            <p>
                                            <div style="text-align: right;">
                                                <button type="submit" style="margin-right: 18px" class="btn btn-dark">Aceptar</button>
                                            </div>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                                    <div class="card p-6 h-full">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                        </div>




                    </div>
                </div>


            </div>
        </div>
    </div>
</div>






<div>&nbsp;</div>


@endsection
