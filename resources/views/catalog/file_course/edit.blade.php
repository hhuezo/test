

@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white"> Modificar Documentos de cursos

                                <a href="{{ url('catalog/FilePerCourse') }}">
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


                                            <form method="POST" action="{{ route('FilePerCourse.update',  $Fcourse->id) }}" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                                <div class="input-area relative pl-28">
                                                    <label for="largeInput" class="inline-inputLabel">cursos</label>
                                                    <select name="catalog_questions_id" id="catalog_questions_id" class="form-control select2">
                                                        @foreach ($course as $obj)
                                                            @if ($obj->id == $Fcourse->course_id)
                                                                <option value="{{ $obj->id }}" selected> {{ $obj->name }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $obj->id }}">{{ $obj->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>&nbsp;

                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">archivo Antiguo</label>
                                                            <input type="tetx" name="route" id="route"
                                                                value={{ $Fcourse->route}} required class="form-control">

                                                            </div>
                                                        <p>
                                                </div><p>
                                                <div class="input-area relative">
                                                    <a href="{{ url('docs/') }}/{{ $Fcourse->route}}" target="_blank"  >  <iconify-icon icon="eva:file-fill" style="color: #0f172a;" width="35"></iconify-icon> vizualizar archivo     </a>
                                                </div>



                                                <div class="card h-full">
                                                    <div class="grid pt-4 pb-3 px-4">
                                                        <div class="input-area relative">

                                                            <label for="largeInput" class="form-label">archivo nuevo</label>
                                                            <input type="file" name="archivo"
                                                                value="{{ old('archivo') }}" required class="form-control">

                                                            </div>
                                                        <p>
                                                </div><p>


                                            <div style="text-align: right;">
                                                <button type="submit"
                                                    class="btn inline-flex justify-center btn-dark">{{ __('Aceptar') }}</button>
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
                        </div>


@endsection
