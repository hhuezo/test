@extends('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Registro
                            <button type="button" data-bs-toggle="modal" data-bs-target="#warningModal" class="btn inline-flex justify-center btn-warning float-right btn-sm">Rechazar</button>
                        </div>
                    </div>
                </header>

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">{{ __('organization.Name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ $member->name_member}}" autofocus="true">
                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Apellido</label>
                            <input type="text" name="last_name" required class="form-control" value="{{ $member->lastname_member}}" autofocus="true">
                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Fecha nacimiento</label>
                            <input type="date" name="birthdate" required class="form-control" value="{{ \Carbon\Carbon::parse($member->birthdate)->format('Y-m-d') }}" autofocus="true">
                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">{{ __('organization.Email') }}</label>
                            <input type="email" name="email" required class="form-control" value="{{ $member->email}}">
                        </div>



                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Organización</label>
                            <input type="text" value="{{$member->organization->name}}" class="form-control">
                        </div> 



                        <div class="input-area relative">
                            &nbsp;
                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Número documento</label>
                            <input type="text" name="document_number" data-inputmask="'mask': ['99999999-9']" required class="form-control" value="{{ $member->document_number}}">
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">{{ __('organization.Phone') }}</label>
                            <input type="text" name="cell_phone_number" required class="form-control" data-inputmask="'mask': ['9999-9999']" value="{{ $member->cell_phone_number}}">
                        </div>


                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Departamento</label>
                            <select id="Departamento" name="Departamento" class="form-control">
                                @foreach ($departamentos as $obj)
                                @if($obj->id == $member->municipio->departamento->id)
                                <option value="{{ $obj->id }}" selected>
                                    {{ $obj->nombre }}
                                </option>
                                @else
                                <option value="{{ $obj->id }}">
                                    {{ $obj->nombre }}
                                </option>
                                @endif
                                @endforeach
                            </select>

                        </div>

                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Municipio</label>
                            <select id="Municipio" name="Municipio" class="form-control select2">
                                @foreach ($municipios as $obj)
                                @if($obj->id == $member->municipio->id)
                                <option value="{{ $obj->id }}" selected>
                                    {{ $obj->nombre }}
                                </option>
                                @else
                                <option value="{{ $obj->id }}">
                                    {{ $obj->nombre }}
                                </option>
                                @endif
                                @endforeach
                            </select>

                        </div>







                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">{{ __('organization.Address') }}</label>
                            <textarea name="address" required class="form-control" rows="5">{{ $member->address }}</textarea>
                        </div>
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">Acerca de mi</label>
                            <textarea name="about_me" class="form-control" rows="5">{{ $member->about_me }}</textarea>
                        </div>




                    </div>
                    <div style="text-align: center;">
                        <a href="{{ url('organization')}}">
                            <button type="button" class="btn inline-flex justify-center btn-dark">Cancelar</button>
                        </a>
                        &nbsp;
                        <button type="button" data-bs-toggle="modal" data-bs-target="#successModal" class="btn inline-flex justify-center btn-success">Activar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                        rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-success-500">
                    <h3 class="text-base font-medium text-white dark:text-white capitalize">
                        Activar miembro
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                    dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ url('member/activate')}}">
                    @csrf
                    <div class="p-6 space-y-4">
                        <h6 class="text-base text-slate-900 dark:text-white leading-6">
                            ¿Esta seguro que desea activar esta organización?
                        </h6>
                        <input type="hidden" name="id" class="form-control" value="{{ $member->id }}">
                        {{-- <p class="text-base text-slate-600 dark:text-slate-400 leading-6">
                            Oat cake ice cream candy chocolate cake apple pie. Brownie carrot cake candy canes. Cake sweet
                            roll cake cheesecake cookie chocolate cake liquorice.
                        </p> --}}
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-success-500">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="warningModal" tabindex="-1" aria-labelledby="warningModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
                        rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-warning-500">
                    <h3 class="text-base font-medium text-white dark:text-white capitalize">
                        Rechazar
                    </h3>
                    <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                                    dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                            11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ url('member/decline')}}">
                    @csrf
                    <div class="p-6 space-y-4">
                        <input type="hidden" name="id" class="form-control" value="{{ $member->id }}">
                        <h6 class="text-base text-slate-900 dark:text-white leading-6">
                            ¿Esta seguro que desea rechazar esta organización?
                        </h6>
                        {{-- <textarea class="form-control" name="observacion" rows="5"></textarea> --}}
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-warning-500">Aceptar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        //combo para Departamento
        $("#Departamento").change();
        $("#Departamento").change(function() {

            // var para la Departamento
            var Departamento = $(this).val();

            $.get("{{ url('get_municipio/') }}" + '/' + Departamento, function(data) {

                console.log(data);
                var _select = ''
                for (var i = 0; i < data.length; i++)
                    _select += '<option value="' + data[i].id + '"  >' + data[i].nombre +
                    '</option>';

                $("#Municipio").html(_select);

            });

        });

    });
</script>

@endsection