@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar Datos de Usuario

                                <a href="{{ url('catalog/Iglesiauser') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button> &nbsp;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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

                                        <form method="POST" action="{{ url('iglesiauser.update', $usuario->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="name" value="{{ $usuario->name }}"
                                                        required class="form-control" value="{{ old('name') }}"
                                                        autofocus="true">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('email') }}</label>
                                                    <input type="text" name="address" value="{{  $usuario->email }}"
                                                        required class="form-control" value="{{ old('email') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('clave') }}</label>
                                                    <input type="text" name="password"  required class="form-control">
                                                </div>


                                                <div class="btn btn-dark btn-sm float-right">
                                                    <div class="input-area relative">
                                                    <button type="submit">{{ __('Aceptar') }}</button>
                                                </div>
                                             </div>
                                             <div class="card-title text-slate-900 dark:text-white">Modificar Datos de Usuario

                                                <a href="{{ url('catalog/Iglesiauser') }}">
                                                    <button type="submit">{{ __('Aceptar') }}</button>
                                                </a>
                                            </div>

                                            &nbsp;



                                                        <p>
                                                    </div>


                                                </div>

                                            </div>

                                        </form>

                                        &nbsp;&nbsp;



                                            &nbsp;



                                        </div>
                                    </div>
                                </div>



@endsection
