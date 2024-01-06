@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Usuario
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
                        <form method="POST" action="{{ route('user.update', $usuarios->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Nombre</label>
                                <input type="text" name="name" value="{{ $usuarios->name }}" required
                                    class="form-control">
                            </div> &nbsp;
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Email</label>
                                <input type="text" name="email" value="{{ $usuarios->email }}" required
                                    class="form-control">
                            </div> &nbsp;

                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Contraseña</label>
                                <input type="password" name="password" required class="form-control">
                            </div> &nbsp;

                            <div></div>


                            &nbsp;
                            <div
                                class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <button style="margin-bottom: 15px"
                                    class="btn inline-flex justify-center btn-dark ml-28 float-right">Aceptar</button>
                            </div>
                        </form>
                    </div>
                    <div>

                    </div>

                </div>
            </div>
        </div>

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">

                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Roles
                                <button class="btn inline-flex justify-center btn-outline-dark float-right" data-bs-toggle="modal"
                                    data-bs-target="#modal-add-{{ $usuarios->id }}">Agregar rol
                            </div>
                        </div>
                    </header>
                    &nbsp;&nbsp;
                    @if ($roles->count() > 0)
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead>
                                <tr>
                                    <th style="text-align: center">Id</th>
                                    <th>Rol</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $obj)
                                    <tr>
                                        <td align="center">{{ $obj->id }}</td>
                                        <td align="center">{{ $obj->name }}</td>
                                        <td align="center">
                                            <iconify-icon icon="mdi:delete-circle" class="danger" width="40" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $obj->id }}"></iconify-icon>

                                        </td>
                                    </tr>
                                    @include('seguridad/user/modal')
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @include('seguridad/user/agrega_roles')

                </div>
            </div>
        </div>
    </div>
    </div>
    <div>&nbsp;</div>
@endsection
