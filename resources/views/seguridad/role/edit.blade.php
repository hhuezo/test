@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">

        <!-- Sized Inputs -->
        <div class="card xl:col-span-2 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">
            <div class="card">
                <div class="p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Rol</div>
                        </div>
                    </header>
                    <div class="space-y-4">
                        <form class="space-y-4">
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Nombre</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                            </div>
                            <div
                                class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <button style="margin-bottom: 15px"
                                    class="btn inline-flex justify-center btn-dark ml-28 float-right">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div>&nbsp;</div>


    <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Agregar permiso</div>
                    </div>
                </header>
                <div class="card-text h-full ">                     
                    <form action="{{ url('seguridad/role/link_permission') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Permiso</label>
                            <input type="hidden" name="role_id" value="{{ $role->id }}">
                            <select name="permission_id" class="form-control select2">
                                @foreach ($permissions as $obj)
                                    <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button style="margin-bottom: 15px"
                                class="btn inline-flex justify-center btn-dark ml-28 float-right">Submit</button>
                        </div>
                    </form>
                </div>



              

                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Listado de permisos</div>
                    </div>
                </header>
                <div class="card-text h-full ">
                    <div class="table-responsive text-nowrap">
                        <!--Table-->
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class=" border-t border-slate-100 dark:border-slate-800">
                                <tr>
                                    <th scope="col" class=" table-th ">#</th>
                                    <th scope="col" class=" table-th ">permiso</th>
                                    <th scope="col" class=" table-th ">eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach ($permission_in_role as $obj)
                                    <tr>
                                        <td class="table-td">{{$i}}</td>
                                        <td class="table-td">{{$obj->name}}</td>
                                        <td class="table-td "><iconify-icon data-bs-toggle="modal"
                                            data-bs-target="#modal-delete-{{ $obj->id }}" icon="mdi:trash"
                                            style="color: #8f2929;" width="40"></iconify-icon></td>
                                    </tr>
                                    @php($i++)

                                    @include('seguridad.role.modal')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    </section>
                </div>




            </div>
        </div>

    </div>
@endsection
