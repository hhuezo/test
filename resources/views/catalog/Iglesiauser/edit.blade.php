@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar Datos de participante

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                                            <form method="POST" action="{{ route('member.update', $member->id) }}"
                                                class="space-y-4">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Iglesia  </label>
                                                    <select id="iglesia_id" name="iglesia_id" class="form-control">
                                                        @foreach ($iglesia as $obj)
                                                        <option value="{{ $obj->id }}">{{ $obj->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Grupo</label>
                                                    <select id="grupo_id" name="grupo_id" class="form-control select2">
                                                        @foreach ($grupo as $obj)
                                                        <option value="{{ $obj->id }}">{{ $obj->nombre }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Nombre</label>
                                                    <input type="text"  id="name_member" name="name_member" value="{{ $member->name_member }}"
                                                        required class="form-control" value="{{ old('name_member') }}"
                                                        autofocus="true">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Apellido</label>
                                                    <input type="text" id="lastname_member" name="lastname_member"
                                                        onblur="this.value = this.value.toUpperCase()"
                                                        required class="form-control"
                                                         value="{{ $member->lastname_member }}" value="{{ old('lastname_member') }}"
                                                        autofocus="true">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">Fecha
                                                        nacimiento</label>
                                                    <input type="date" id="birthdate"
                                                        name="birthdate" required
                                                        class="form-control"
                                                        onblur="calcularEdad(this.value)"   value="{{ $member->birthdate }}"
                                                        value="{{ old('birthdate') }}"
                                                        autofocus="true">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Email</label>
                                                    <input type="email" id="email" name="email" required
                                                        class="form-control"    value="{{ $member->email }}"
                                                        value="{{ old('email') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Número documento</label>
                                                    <input type="text"  id="document_number"  name="document_number"

                                                        data-inputmask="'mask': ['99999999-9']"
                                                        class="form-control"  value="{{ $member->document_number }}"
                                                        value="{{ old('document_number') }}">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">Telefono</label>
                                                    <input type="text" id="cell_phone_number" name="cell_phone_number"
                                                        required class="form-control"
                                                        data-inputmask="'mask': ['9999-9999']" value="{{ $member->cell_phone_number }}"
                                                        value="{{ old('cell_phone_number') }}">
                                                </div>



                                                </div>




                                            &nbsp;



                                                        <p>
                                                    </div>

                                                    <div class="btn btn-dark btn-sm float-right">
                                                        <div class="input-area relative">
                                                        <button type="submit">Aceptar</button>
                                                    </div>
                                                 </div>


                                        </form>

                                        &nbsp;&nbsp;



@endsection
