@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Usuario Editar
                                <a href="{{ url('seguridad/user') }}">
                                    <button class="btn btn-dark btn-sm float-right">
                                        <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                        </iconify-icon>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </header>

                    <div class="space-y-4">
                        <form method="POST" action="{{ url('seguridad.user.update', $usuarios->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">nombre</label>
                                <input type="text" name="name" value="{{ $usuarios->name }}" required
                                    class="form-control">
                            </div> &nbsp;
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Email</label>
                                <input type="text" name="email" value="{{ $usuarios->email }}" required
                                    class="form-control">
                            </div> &nbsp;

                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">clave</label>
                                <input type="text" name="password" required class="form-control">
                            </div> &nbsp;

                            <div></div>


                            &nbsp;
                            <div
                                class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <button style="margin-bottom: 15px"
                                    class="btn inline-flex justify-center btn-dark ml-28 float-right">Aceptar</button>
                            </div>
                    </div>
                    </form>
                    <iconify-icon data-bs-toggle="modal" data-bs-target="#modal-add-{{ $usuarios->id }}"
                        icon="mdi:plus" style="color: #1769aa;" width="40"></iconify-icon>
                    &nbsp;&nbsp;
                    <table id="myTable" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align: center">Id</th>
                                <th>rol</th>
                                <th>opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                @foreach ($roles as $obj)
                                    <td align="center">{{ $obj->id }}</td>
                                    <td align="center">{{ $obj->name }}</td>
                                    <td align="center">
                                        <iconify-icon data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                            style="color: #1769aa;" width="40"></iconify-icon>
                                    </td>
                            </tr>
                            @include('seguridad/user/modal')
                            @endforeach
                        </tbody>
                    </table>
                    @include('seguridad/user/agrega_roles')
                </div>
            </div>
        </div>
    </div>
    </div>
    <div>&nbsp;</div>
@endsection
