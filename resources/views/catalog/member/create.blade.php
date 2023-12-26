@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Crear datos del Participantes


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
                                    <form method="POST" action="{{ url('catalog/member') }}">
                                        @csrf

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Iglesia</label>
                                                <select id="organization_id" name="organization_id" class="form-control select2" required>
                                                    @foreach ($iglesias as $obj)
                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->name }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre') }}</label>
                                                <input type="text" name="name_member" id="name_member" required class="form-control" value="{{ old('name_member') }}" autofocus="true">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Apellido') }}</label>
                                                <input type="text" id="lastname_member" name="lastname_member" required class="form-control" value="{{ old('lastname_member') }}">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Fecha Nacimiento</label>
                                                <input type="date" name="birthdate" id="birthdate" required class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Genero</label>
                                                <select name="catalog_gender_id" id="catalog_gender_id" class="form-control" required>
                                                    @foreach ($generos as $obj)
                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->description }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Grupos</label>
                                                <select name="group_id" id="grupo_id" class="form-control">
                                                    @foreach ($grupos as $obj)

                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->nombre  }}
                                                    </option>

                                                    @endforeach

                                                </select>
                                            </div>



                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Correo</label>
                                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Numero de documento</label>
                                                <input type="text" id="document_number" name="document_number" data-inputmask="'mask': ['99999999-9']" required class="form-control">
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label"> Telefono </label>
                                                <input type="text" name="cell_phone_number" id="cell_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ old('cell_phone_number') }}">
                                            </div>






                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Contraseña</label>
                                                <input type="password" id="password" name="password" required class="form-control">
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Confirme Contraseña</label>
                                                <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                                            </div>


                                            {{-- <div class="input-area relative">
                                            <label for="largeInput" class="form-label">¿Es Pastor? </label>
                                                <div class="boton">
                                                    <input type="checkbox" id="btn-switch" name="is_pastor">
                                                    <label for="btn-switch" class="lbl-switch"></label>
                                                </div>
                                            </div> --}}

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Departamento</label>
                                                <select id="departamento_id" name="departamento_id" class="form-control" required>
                                                    @foreach ($departamentos as $obj)

                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->nombre }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Municipio</label>
                                                <select id="municipio_id" name="municipio_id" class="form-control" required>
                                                    @foreach ($municipios as $obj)


                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->nombre }}
                                                    </option>

                                                    @endforeach

                                                </select>

                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Estatus</label>
                                                <select name="status" id="status" class="form-control select2">
                                                    @foreach ($member_status as $obj)

                                                    <option value="{{ $obj->id }}">
                                                        {{ $obj->description_es }}
                                                    </option>

                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Dirección</label>
                                                <textarea name="address" id="address" required class="form-control" rows="5"></textarea>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Acerca de mi</label>
                                                <textarea name="about_me" id="about_me" class="form-control" rows="5"></textarea>
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
</div>


<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(":input").inputmask();
        $("#departamento_id").change(function() {
            console.log($(this).val());
            var Departamento = $(this).val();

            $.get("{{ url('get_municipio/') }}" + '/' + Departamento, function(data) {
                console.log(data);
                var _select = ''
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                    '</option>';
                $("#municipio_id").html(_select);
            });

        });


    });

    function calcularEdad(fechaNacimiento) {
        var fechaNac = new Date(fechaNacimiento);
        var fechaActual = new Date();

        var edad = fechaActual.getFullYear() - fechaNac.getFullYear();
        var mes = fechaActual.getMonth() - fechaNac.getMonth();

        if (mes < 0 || (mes === 0 && fechaActual.getDate() < fechaNac.getDate())) {
            edad--;
        }

        if (edad >= 18) {
            $("#document_number").prop("required", true);
        } else {
            $("#document_number").prop("required", false);
        }


        $.get("{{url('/get_grupo')}}/" + fechaNacimiento, function(data) {
            // Manejar la respuesta aquí
            var _select = ''
            for (var i = 0; i < data.length; i++)
                _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                '</option>';

            $("#grupo_id").html(_select);
        });

    }
</script>
<script type="text/javascript">
    function modal_edit(id, name) {
        //alert(id);
        document.getElementById('id').value = id;
        document.getElementById('name').value = name;
        $('#usuario_edit_modal').modal('show');
    };
</script>
@endsection
