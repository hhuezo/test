@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Crear Organizacion

                            <a href="{{ url('catalog/organization') }}">
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
                                    <form method="POST" action="{{ url('catalog/organization') }}">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre Español') }}</label>
                                                <input type="text" name="name" required class="form-control" value="{{ old('name') }}" autofocus="true">
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                <input type="text" name="address" required class="form-control" value="{{ old('address') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Pais') }}</label>
                                                <select name="country_id" class="form-control select2">
                                                    @foreach($countrys as $obj)
                                                    <option value="{{$obj->id}}">{{$obj->description}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('ciudad') }}</label>
                                                <input type="text" name="city_id" required class="form-control" value="{{ old('city_id') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('numero telefonico') }}</label>
                                                <input type="text" name="phone_mumber" required class="form-control" value="{{ old('course_id') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('notas') }}</label>
                                                <input type="text" name="notas" required class="form-control" value="{{ old('notas') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('nombre contacto') }}</label>
                                                <input type="text" name="contact_name" required class="form-control" value="{{ old('contact_name') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('titulo de contacto en el trabajo') }}</label>
                                                <input type="text" name="contact_job_title" required class="form-control" value="{{ old('contact_job_title') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('numero telefonico del contacto') }}</label>
                                                <input type="text" name="contact_phone_number" required class="form-control" value="{{ old('contact_phone_number') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('numero telefonico del contacto 2') }}</label>
                                                <input type="text" name="contact_phone_number_2" required class="form-control" value="{{ old('contact_phone_number_2') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('nombre contacto secundario') }}</label>
                                                <input type="text" name="secondary_contact_name" required class="form-control" value="{{ old('contact_name') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('titulo de contacto secundario en el trabajo') }}</label>
                                                <input type="text" name="secondary_contact_job_title" required class="form-control" value="{{ old('secondary_contact_job_title') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Numero secundario de contacto') }}</label>
                                                <input type="text" name="secondary_contact_number" required class="form-control" value="{{ old('secondary_contact_number') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Numero secundario de contacto 2') }}</label>
                                                <input type="text" name="secondary_contact_number_2" required class="form-control" value="{{ old('secondary_contact_number_2') }}">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Estatus</label>
                                                <select name="catalog_estatus_id" class="form-control">
                                                    @foreach ($estatuorg as $obj)
                                                    <option value="{{ $obj->id }}">{{ $obj->description }}
                                                    </option>
                                                    @endforeach
                                                </select>
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