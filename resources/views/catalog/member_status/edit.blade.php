@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Estatus del Participante

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
                                        <form method="POST" action="{{ route('member_status.update', $MemberStatus->id) }}"
                                            class="space-y-4">
                                            @method('PUT')
                                   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('description') }}</label>
                                                    <input type="text" name="name_es" id="name_es" value="{{ $MemberStatus->description }}"
                                                        required class="form-control" value="{{ old('description') }}"
                                                        autofocus="true">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('description_español') }}</label>
                                                    <input type="text" name="name_en" id= "name_en" value="{{ $MemberStatus->description_es }}"
                                                        required class="form-control" value="{{ old('description_es') }}">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('fecha') }}</label>
                                                    <input type="text" name="adding_date" id= "adding_date" value= "{{ date('d/m/Y', strtotime($MemberStatus->adding_date)) }}"
                                                                                       required class="form-control"    value="{{ old('adding_date') }}">
                                                </div>


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
