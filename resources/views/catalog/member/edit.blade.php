@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Participantes

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
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="name_member"
                                                        value="{{ $member->name_member }}" required class="form-control"
                                                        value="{{ old('name_member') }}" autofocus="true">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('Apellido') }}</label>
                                                    <input type="text" name="lastname_member"
                                                        value="{{ $member->lastname_member }}" required class="form-control"
                                                        value="{{ old('lastname_member') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('fecha cumpleaños') }}</label>
                                                    <input type="date" name="birthdate"
                                                        value="{{ $member->birthdate }}" required
                                                        class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('numero de documento') }}</label>
                                                    <input type="text" name="document_number_type"
                                                        value="{{ $member->document_number_type }}" required
                                                        class="form-control">
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                    class="form-label">Status</label>
                                                    <select name="status" class="form-control select2">
                                                        @foreach ($member_status as $obj)
                                                            @if ($obj->id == $member->status)
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
                                                    class="form-label">Grupos</label>
                                                    <select name="grupo_id" class="form-control select2">
                                                        @foreach ($group_church as $obj)
                                                         <option value="{{ $obj->grupo->id }}" {{  $obj->grupo->id == $group_id ? 'selected':''}}   >{{ $obj->grupo->nombre }}   </option>
                                                        @endforeach
                                                    </select>
                                                </div>&nbsp;&nbsp;
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
