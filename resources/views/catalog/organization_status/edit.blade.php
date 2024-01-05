
@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Estatus de Organizaciones Modificar

                                <a href="{{ url('catalog/organization_status/') }}">
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
                                        <form method="POST" action="{{ route('member_status.update',$OrganizationStatus->id) }}"
                                            class="space-y-4">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="description" id= "description" value="{{ $OrganizationStatus->description }}"
                                                        required class="form-control" value="{{ old('description') }}"
                                                        autofocus="true">
                                                </div>



                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Fecha') }}</label>
                                                    <input type="text" name="adding_date" id= "adding_date"
                                                    value="{{ date('d/m/Y', strtotime(  $OrganizationStatus->adding_date )) }}"    required class="form-control">
                                                </div>

                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Modificacion Usuario') }}</label>
                                                    <input type="text" name="modifying_user" id="modifying_user"
                                                        value="{{ date('d/m/Y', strtotime( $OrganizationStatus->modifying_user )) }}" required class="form-control" >
                                                </div>
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Modificar Fecha ') }}</label>
                                                    <input type="text" name="modifying_date" id= "modifying_date"   value="{{ date('d/m/Y', strtotime(  $OrganizationStatus->modifying_date )) }} "
                                                        required class="form-control" value="{{ old('modifying_date') }}">
                                                </div>
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
