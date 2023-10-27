@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Agregar o Quitar Iglesias a Usuario

                                <a href="{{ url('catalog/Iglesiauser') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button> &nbsp;
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

                                        <form method="POST" action="{{ url('iglesiauser.update', $usuario->id) }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('Nombre') }}</label>
                                                    <input type="text" name="name" value="{{ $usuario->name }}"
                                                        required class="form-control" value="{{ old('name') }}"
                                                        autofocus="true">
                                                </div>


                                                <div class="input-area relative">
                                                    <label for="largeInput" class="form-label">{{ __('email') }}</label>
                                                    <input type="text" name="address" value="{{  $usuario->email }}"
                                                        required class="form-control" value="{{ old('email') }}">
                                                </div>


                                                <iconify-icon data-bs-toggle="modal"
                                                data-bs-target="#modal-create-{{$usuario->id }}" icon="mdi:plus"
                                                style="color: #1769aa;" width="40"></iconify-icon>
                                            &nbsp;


                                                        </div>
                                                        <p>
                                                    </div>


                                                </div>

                                            </div>

                                        </form>

                                        &nbsp;&nbsp;


                                        <div class="input-area relative">
                                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Iglesia</th>
                                                        <th style="text-align: center">Nombre</th>
                                                        <th style="text-align: center">Responsable</th>
                                                        <th style="text-align: center">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $usuario_iglesias  as $obj)
                                                        <td align="center"> {{ $obj->id }} </td>
                                                        <td align="center">{{ $obj->name }}</td>
                                                        <td align="center"> {{ $obj->pastor_name }}</td>
                                                        <td align="center">
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                                                style="color: #1769aa;" width="40"></iconify-icon>
                                                        </td>
                                                        </tr>
                                                        @include('catalog.Iglesiauser.modaldeliglesia')
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            &nbsp;

                                            @include('catalog.Iglesiauser.modaladdiglesia')
                                            &nbsp;

                                            {{-- @foreach ($wizzarquestion as $obj1) @include('catalog.iglesia.modaleditanswer')  @include('catalog.iglesia.modalcreatequestion')
                                                        @include('catalog.iglesia.modaldelquestion')
                                                        <tr>  @include('catalog.iglesia.modaldelquestion')
                                                            @foreach ($wizzaranswer as $obj2)
                                                                @if ($obj1->id == $obj2->question_id)
                                                                <td align="center"> {{ $obj2->iglesia_id }} </td>
                                                                    <td align="center">{{ $obj2->question_id }}</td>
                                                                    <td align="center">{{ $obj1->question }}</td>
                                                                    <td align="center">
                                                                        @if ($obj2->answer == 1)
                                                                            <fieldset>
                                                                                <legend></legend>
                                                                                <div>
                                                                                    <input type="checkbox" id="answer"
                                                                                        name="answer" value="answer"
                                                                                        checked />
                                                                                    <label for="answer">Si</label>
                                                                                </div>
                                                                            @else
                                                                             <td align="center">
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-{{ $obj->id }}"
                                                                icon="mdi:pencil-box" style="color: #1769aa;"
                                                                width="40"></iconify-icon> &nbsp;&nbsp;
                                                            <iconify-icon data-bs-toggle="modal"
                                                                data-bs-target="#modal-preg-{{$obj->iglesia_id  }}"
                                                                icon="mdi:trash" style="color: #1769aa;"
                                                                width="40"></iconify-icon>

                                                        </td>
                                                                                <div>
                                                                                    <input type="checkbox" id="answer"
                                                                                        name="answer" value="answer" />
                                                                                    <label for="answer">No</label>
                                                                                </div>
                                                                            </fieldset>
                                                                        @endif
                                                                    </td>
                                                                    <td align="center">
                                                                        <iconify-icon data-bs-toggle="modal"
                                                                            data-bs-target="#modal3"
                                                                            icon="mdi:pencil-box" style="color: #1769aa;"
                                                                            width="40"></iconify-icon>
                                                                    </td>
                                                                @endif
                                                                @include('catalog.iglesia.modaleditanswer')
                                                            @endforeach
                                                        </tr>

                                                    @endforeach --}}

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


@endsection
