@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
        <!-- Basic Inputs -->
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex items-center border-b border-slate-100 dark:border-slate-700">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Importar Asistencias

                            <a href="{{ url('administracion/iglesia_plan_estudio') }}">
                                <button class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                        <br>
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
                    <br>
                @endif
                <form method="POST" action="{{ url('admin/import_excel') }}" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-7">
                    <div class="input-area relative" >
                    &nbsp;
                    </div>
                        <div class="input-area relative" >
                            <label for="largeInput" class="form-label">Subir archivo</label>
                            <input type="file" name="fileExcel" required class="form-control" >
                        </div>
                    </div>
                    <br>
                    <div style="text-align: right;">
                        <button type="submit" class="btn inline-flex justify-center btn-dark">Guardar</button>
                    </div>


                </form>
            </div>
        </div>

    </div>



@endsection
