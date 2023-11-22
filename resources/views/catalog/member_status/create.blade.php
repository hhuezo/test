@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Nuevo estado del Participante

                                <a href="{{ url('catalog/member_status') }}">
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
                                    <div class="xl:col-span-3 col-span-12 lg:col-span-3 ">
                                        <div class="card p-6 h-full">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="xl:col-span-6 col-span-12 lg:col-span-6">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ url('catalog/member_status') }}">
                            @csrf
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label">{{ __('Descripcion') }}</label>
                                    <input type="text" name="description" required
                                        class="form-control"
                                        value="{{ old('description') }}"
                                        autofocus="true">
                                </div>


                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label">{{ __('Descripcion_español') }}</label>
                                    <input type="text" name="description_es" required
                                        class="form-control"
                                        value="{{ old('description_es') }}">
                                </div>

                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label">{{ __('Estatus') }}</label>
                                    <input type="status"
                                        name="status" required
                                        class="form-control">
                                </div>

                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label">{{ __('Fecha_creada') }}</label>
                                    <input type="text" name="date_created"
                                        required class="form-control"
                                        value="{{ old('date_created') }}">
                                </div>
                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label">{{ __('course_id') }}</label>
                                    <input type="text" name="course_id"
                                        required class="form-control"
                                        value="{{ old('course_id') }}">
                               </div>
                            </div>
                            <div class="input-area relative">
                                <label for="largeInput"
                                        class="form-label">{{ __('status') }}</label>
                                <select name="status" class="form-control">
                                    @foreach ($MemberStatus as $obj)
                                        <option value="{{ $obj->id }}">{{ $obj->description_es }}
                                        </option>
                                    @endforeach
                                </select>
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
@endsection
