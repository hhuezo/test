@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Ingresar Datos generales de la iglesia

                            <a href="{{ url('catalog/iglesia') }}">
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
                                    <form method="POST" action="{{ url('catalog/iglesia') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                <input type="text" name="name" required class="form-control" value="{{ old('name') }}" autofocus="true">
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                <input type="text" name="address" required class="form-control" value="{{ old('address') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('departamento') }}</label>
                                                <select name="catalog_departamento_id" class="form-control select2">
                                                    @foreach($depto as $obj1)
                                                    <option value="{{$obj1->id}}">{{$obj1->nombre}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                          <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('municipio') }}</label>
                                                <select name="catalog_municipio_id" class="form-control select2">
                                                    @foreach($municipio as $obj2)
                                                    @if ($obj2->departamento_id == $obj1->id )
                                                    <option value="{{ $obj2->id }}">{{ $obj2->nombre }}</option>
                                                      @endif
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('telefono') }}</label>
                                                <input type="text" name="phone_number" required class="form-control" value="{{ old('phone_number') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Notas') }}</label>
                                                <input type="text" name="notes" required class="form-control" value="{{ old('notes') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre de Contacto') }}</label>
                                                <input type="text" name="contac_name" required class="form-control" value="{{ old('contac_name') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Cargo del contacto') }}</label>
                                                <input type="text" name="contact_job_title" required class="form-control" value="{{ old('contact_job_title') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('telefono del contacto') }}</label>
                                                <input type="text" name="contac_phone_number" required class="form-control" value="{{ old('contac_phone_number') }}">
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre de segundo Contacto') }}</label>
                                                <input type="text" name="secondary_contac_name" required class="form-control" value="{{ old('secondary_contac_name') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Cargo del segundo contacto') }}</label>
                                                <input type="text" name="secondary_job_title" required class="form-control" value="{{ old('secondary_job_title') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('telefono1 del Segundo  contacto') }}</label>
                                                <input type="text" name="secondary_contac_phone_number" required class="form-control" value="{{ old('contac_phone_number') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('telefono2 del Segundo  contacto') }}</label>
                                                <input type="text" name="secondary_contac_phone_number_2" required class="form-control" value="{{ old('contac_phone_number_2') }}">
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Lider Religioso') }}</label>
                                                <input type="text" name="pastor_name"   required class="form-control" value="{{ old('pastor_name') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Telefono de Pastor') }}</label>
                                                <input type="text" name="pastor_phone_number"    required class="form-control" value="{{ old('pastor_phone_number') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Red social') }}</label>
                                                <input type="text" name="facebook" required class="form-control" value="{{ old('facebook') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('sitio web') }}</label>
                                                <input type="text" name="website" required class="form-control" value="{{ old('website') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Personeria Juridica') }}</label>
                                                <input type="text" name="Personeria_Juridica" required class="form-control" value="{{ old('Personeria_Juridica') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('tipo de organizacion') }}</label>
                                                <select name="organization_type" class="form-control">
                                                    @foreach ($organizacion as $obj)
                                                    <option value="{{ $obj->id }}">{{ $obj->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                   <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Estatus</label>
                                                <select name="Status" class="form-control">
                                                    @foreach ($estatuorg as $obj2)
                                                    <option value="{{ $obj2->id }}">{{ $obj2->description }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Sede') }}</label>
                                                <select name="sede_id" class="form-control select2">
                                                @foreach($sede as $obj3)
                                                <option value="{{ $obj3->id }}">{{ $obj3->nombre }}</option>
                                               @endforeach
                                            </select>
                                            </div>



                                            <div class="card h-full">
                                                <div class="grid pt-4 pb-3 px-4">
                                                    <div class="input-area relative">

                                                        <label for="largeInput" class="form-label">Imagen logo</label>
                                                        <input type="file" name="logo_name"
                                                            value="{{ old('logo_name') }}" required class="form-control">

                                                        </div>
                                                    <p>
                                            </div><p>



                                         <!--   <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('url de logo') }}</label>
                                                <input type="text" name="url_logo" required class="form-control" value="{{ old('url_logo') }}">
                                            </div>-->



                                        </div>
                                        <div></div>
                                        <div class="card h-full">
                                         <div class="grid pt-4 pb-3 px-4">
                                          <div class="input-area relative">
                                        <div style="text-align: right;">
                                            <button type="submit" class="btn inline-flex justify-right btn-dark">{{ __('Aceptar') }}</button>
                                        </div>
                                        </div>&nbsp;
                                         </div>
                                        </div>
                                        </div>

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
