@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 black:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 black:text-white">Ingresar Datos de las  preguntas  de la Iglesia

                            <a href="{{ url('catalog/answerreg') }}">
                                <button class="btn btn-black btn-sm float-right">
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
                                    <form method="POST" action="{{ url('catalog/answerreg/create') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Iglesia</label>
                                            <select id="iglesia_id" name="iglesia_id" class="form-control" required>
                                                @foreach ($iglesia as $obj)
                                                <option value="{{ $obj->id }}">
                                                    {{ $obj->name }}
                                                </option>
                                                @endforeach
                                            </select>


                                        </div>
                                                <div>  &nbsp;&nbsp;</div>
                                            <table id="myTable" class="bg-slate-200 black:bg-slate-700" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Id</th>
                                                        <th style="text-align: center">Pregunta</th>
                                                        <th style="text-align: center">Respuesta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                        @foreach ($wizzarquestion as $obj2)
                                                        <tr class="even:bg-slate-50 black:even:bg-slate-700">
                                                                    <td align="center">{{ $obj2->id }}</td>
                                                                    <td align="center">{{ $obj2->question }}</td>
                                                                    <td align="center">
                                                                    <div class="basicRadio">
                                                                        <label>
                                                                            <label>
                                                                                <legend></legend>
                                                                                <div class="primary-radio">
                                                                                    <label
                                                                                        class="flex items-center cursor-pointer">
                                                                                        <input type="radio"
                                                                                            class="hidden"
                                                                                            name="answer"
                                                                                            value="Si"
                                                                                            checked="checked">
                                                                                        <span
                                                                                            class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                        <span
                                                                                            class="text-primary-500 text-sm leading-6 capitalize">Si</span>
                                                                                    </label>
                                                                                </div>
                                                                            </label>
                                                                            <label>

                                                                                <div class="primary-radio">
                                                                                    <label
                                                                                        class="flex items-center cursor-pointer">
                                                                                        <input type="radio"
                                                                                            class="hidden"
                                                                                            name="answer"
                                                                                            value="No">
                                                                                        <span
                                                                                            class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                                        <span
                                                                                            class="text-primary-500 text-sm leading-6 capitalize">No</span>
                                                                                    </label>
                                                                                </div>
                                                                            </label>
                                                                        </label>
                                                                    </div>
                                                                </td>

                                                                </tr>
                                                       @endforeach

                                                </tbody>
                                            </table>
                                            <div>  &nbsp;&nbsp;</div>
                                              <div style="text-align: right;">
                                            <button type="submit" class="btn inline-flex justify-center btn-black">{{ __('Aceptar') }}</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection
