@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white"> Modificar Servidor de Correos

                                <a href="{{ url('administracion/configuracion_correos') }}">
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
                                        <form method="POST" action="{{ route('administracion/configuracion_correos',  $configcorreo->id) }}" class="space-y-4">
                                            @method('PUT')
                                            @csrf



                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="smtp_host" id="smtp_host" value="{{  $configcorreo->smtp_host}}" required class="form-control" value="{{ old('smtp_host') }}" autofocus="true">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Apellido') }}</label>
                                                    <input type="text" id="smtp_port" name="smtp_port" value="{{  $configcorreo->smtp_port }}" required class="form-control" value="{{ old('smtp_port') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">fecha nacimiento</label>
                                                    <input type="text" name="smtp_username" id="smtp_username" value="{{  $configcorreo->smtp_username}}" required class="form-control">
                                                </div>



                                                <input type="hidden" id="id" name="text" value="{{  $configcorreo->id }}" class="form-control" >
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Correo</label>
                                                    <input type="text" id="smtp_password" name="smtp_password" value="{{  $configcorreo->smtp_password }}" class="form-control" value="{{ old('smtp_password') }}">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('numero de documento') }}</label>
                                                    <input type="text" id="document_number" name="document_number"  data-inputmask="'mask': ['99999999-9']" value="{{ $configcorreo->document_number }}" required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label"> Telefono </label>
                                                    <input type="text" name="cell_phone_number" value="{{   $configcorreo->cell_phone_number }}" id="cell_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ old('cell_phone_number') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Contraseña</label>
                                                    <input type="password" id="password" name="password"   class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Confirme Contraseña</label>
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
                                                </div>


                                                 <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Dirección</label>
                                                    <textarea name="address" id="address" required class="form-control" rows="5">{{  $configcorreo->address }}</textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Acerca de mi</label>
                                                    <textarea name="about_me" id="about_me" class="form-control" rows="5">{{  $configcorreo->about_me }}</textarea>
                                                </div>

                                            </div>&nbsp;
                                            <div style="text-align: right;">
                                                <button type="submit" class="btn inline-flex justify-center btn-dark">{{ __('Aceptar') }}</button>
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
