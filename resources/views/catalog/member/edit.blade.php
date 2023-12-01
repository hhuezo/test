@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Editar datos participante

                                <a href="{{ url('catalog/member') }}">
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

                                        <form method="POST" action="{{ route('member.update', $member->id) }}"
                                            class="space-y-4">
                                            @method('PUT')
                                            @csrf

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Iglesia</label>
                                                <select id="organization_id" name="organization_id" class="form-control" required>
                                                    @foreach ($iglesia as $obj)
                                                    @if ($obj->id == $member->organization_id)
                                                        <option value="{{ $obj->id }}" selected>
                                                            {{ $obj->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $obj->id }}">
                                                            {{ $obj->name }}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                            </div>



                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="name_member" id="name_member"
                                                        value="{{ $member->name_member }}" required class="form-control"
                                                        value="{{ old('name_member') }}" autofocus="true">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Apellido') }}</label>
                                                    <input type="text"  id="lastname_member" name="lastname_member"
                                                        value="{{ $member->lastname_member }}" required class="form-control"
                                                        value="{{ old('lastname_member') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('fecha cumpleaños') }}</label>
                                                    <input type="date" name="birthdate" id="birthdate"
                                                        value="{{ $member->birthdate }}" required
                                                        class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero de documento') }}</label>
                                                    <input type="text" id="document_number" name="document_number"
                                                        value="{{ $member->document_number }}" required
                                                        class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                    class="form-label">Grupos</label>
                                                    <select name="group_id" class="form-control select2">

                                                            @foreach ($grupos as $obj)
                                                                <option value="{{ $obj->id }}">{{ $obj->nombre }}        </option>
                                                            @endforeach

                                                    </select>
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Email</label>
                                                    <input type="email" id="email" name="email"   value="{{ $member->email }}" class="form-control"  value="{{ old('email') }}">
                                                </div>


                                              {{--   <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Contraseña</label>
                                                    <input type="password" name="password" required class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Confirme Contraseña</label>
                                                    <input type="password" name="password_confirmation" required class="form-control">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Teléfono</label>
                                                    <input type="text" name="phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ old('phone_number') }}">
                                                </div>
                                              {{--  <div class="input-area relative">
                                                <label for="largeInput" class="form-label">¿Es Pastor? </label>
                                                    <div class="boton">
                                                        <input type="checkbox" id="btn-switch" name="is_pastor">
                                                        <label for="btn-switch" class="lbl-switch"></label>
                                                    </div>
                                                </div>--}}

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Departamento</label>
                                                    <select id="departamento_id" name="departamento_id" class="form-control" required>
                                                        @foreach ($departamentos as $obj)
                                                        @if ($obj->id == $member->departamento_id)
                                                            <option value="{{ $obj->id }}" selected>
                                                                {{ $obj->nombre }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $obj->id }}">
                                                                {{ $obj->nombre }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Municipio</label>
                                                    <select id="municipio_id" name="municipio_id" class="form-control" required>
                                                        @foreach ($municipios as $obj)
                                                        @if ($obj->id == $member->municipio_id)
                                                            <option value="{{ $obj->id }}" selected>
                                                                {{ $obj->nombre }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $obj->id }}">
                                                                {{ $obj->nombre }}</option>
                                                        @endif
                                                    @endforeach

                                                    </select>

                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                    class="form-label">Estatus</label>
                                                    <select name="status" class="form-control select2">
                                                        @foreach ($member_status as $obj)
                                                            @if ($obj->id == $member->status_id)
                                                                <option value="{{ $obj->id }}" selected>
                                                                    {{ $obj->description_es }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $obj->id }}">
                                                                    {{ $obj->description_es }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Género</label>
                                                    <select name="catalog_gender_id" class="form-control">
                                                        @foreach ($generos as $obj)
                                                            <option value="{{$obj->id}}" >{{$obj->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Dirección</label>
                                                    <textarea name="address" id="address"   required class="form-control" rows="5">{{ $member->address }}</textarea>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Acerca de mi</label>
                                                    <textarea name="about_me" id= "about_me"   class="form-control" rows="5">{{ $member->about_me }}</textarea>
                                                </div>

                                            </div>&nbsp;
                                            <div style="text-align: right;">
                                                <button type="submit"
                                                    class="btn inline-flex justify-center btn-dark">{{ __('Aceptar') }}</button>
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
