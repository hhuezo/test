@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <h4>
                                <center>Datos de la Iglesia </center>

                            </h4>
                            <div class="card-title text-slate-900 dark:text-white">

                                <button class="btn btn-dark btn-sm float-right">
                                    <img src="img/qrcodeiglesia.png">
                                </button>
                                <button class="btn btn-dark btn-sm float-left">
                                    <img src="{{ $iglesia->logo_url }}{{ $iglesia->logo }}" width="120" height="120" >
                                </button>

                            </div>
                        </div>
                    </header>
                    <div class="transition-all duration-150 container-fluid" id="page_layout">
                        <div id="content_layout">
                            <div class="space-y-5">
                                <div class="grid grid-cols-12 gap-5">

                                    <div class="xl:col-span-12 col-span-12 lg:col-span-12">

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">


                                            <div class="input-area relative">
                                                <input type="hidden" name="iglesia_id" value="{{ $iglesia->id }}"
                                                    required class="form-control" autofocus="true" disabled>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput"
                                                    class="form-label">{{ __('Nombre de la Iglesia') }}</label>
                                                <input type="text" name="name_member" value="{{ $iglesia->name }}"
                                                    required class="form-control" autofocus="true" disabled>
                                            </div>


                                            <div class="input-area relative">
                                                <label for="largeInput"
                                                    class="form-label">{{ __('Estado de la Iglesia') }}</label>
                                                <input type="text" name="estado"
                                                    value=" {{ $iglesia->iglesia_estatus->description_es }}" required
                                                    class="form-control" autofocus="true" disabled>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Nombre Pastor') }}</label>
                                                <input type="text" name="{{ $iglesia->pastor_name }}"
                                                    value="{{ $iglesia->pastor_name }}" required class="form-control"
                                                    disabled>
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput"
                                                    class="form-label">{{ __('Telefono de Pastor') }}</label>
                                                <input type="text" name="{{ $iglesia->pastor_phone_number }}"
                                                    value="{{ $iglesia->pastor_phone_number }}" required
                                                    class="form-control" disabled>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Direccion') }}</label>
                                                <input type="text" name="lastname_member"
                                                    value="{{ $iglesia->address }}" required class="form-control"
                                                    value="{{ old('lastname_member') }}" disabled>
                                            </div>

                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">{{ __('Departamento') }}</label>
                                                <input type="text" value="{{ $iglesia->departamento->nombre }}" required
                                                    class="form-control" disabled>
                                            </div>




                                            <div class="input-area relative">
                                                <iconify-icon icon="logos:facebook"></iconify-icon>
                                                <label>facebook {{ $iglesia->facebook }}</label>
                                            </div>

                                            <div class="input-area relative">
                                                <iconify-icon icon="logos:youtube"></iconify-icon>
                                                <label> sitio {{ $iglesia->website }}</label>
                                            </div>

                                            <a href="{{url('consulta_grupos')}}/{{$iglesia->id}}">
                                                <iconify-icon icon="healthicons:eye-negative" style="color: #1769aa;" width="40"></iconify-icon>
                                                </a>
                                                &nbsp;&nbsp;
                                        </div>

<center>

 <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                        <thead class="bg-slate-200 dark:bg-slate-700">

                                    <tr class="td-table">
                                        <th style="text-align: center">Iglesia</th>
                                        <th style="text-align: center">Grupo</th>
                                        <th style="text-align: center">Nombre</th>
                                        <th style="text-align: center">Conteo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ( $conteo_miembros as $obj)
                                            <tr>

                                                    <td  align="center">{{ $obj->nombre_iglesia }}</td>
                                                    <td  align="center">{{ $obj->No_grupo }}</td>
                                                    <td  align="center">{{ $obj->nombre_grupo }}</td>
                                                    <td  align="center">{{ $obj->numero_participantes }}</td>

                                            </tr>

                                        @endforeach

                                </tbody>
                            </table>
                        </center>


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
