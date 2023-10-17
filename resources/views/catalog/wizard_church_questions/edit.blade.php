
@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">
        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Preguntas modificar

                                <a href="{{ url('catalog/wizard_church_questions') }}">
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


                                        <form method="POST" action="{{ route('wizard_church_questions.update', $wizzarquestion->id) }}">
                                            @method('PUT')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                                <div class="input-area relative">
                                                    <label for="largeInput"
                                                        class="form-label">{{ __('question') }}</label>
                                                    <input type="text" name="question" value="{{ $wizzarquestion->question }}"
                                                        required class="form-control" value="{{ old('question') }}"
                                                        autofocus="true">
                                                </div>


                                                <div class="input-area relative">
                                                <fieldset class="altura">
                                                    <legend>Respuesta</legend>
                                                    <div class="basicRadio">
                                                        <label>
                                                            <label>
                                                                <div class="secondary-radio">
                                                                    <label
                                                                        class="flex items-center cursor-pointer">
                                                                        <input type="radio"
                                                                            class="hidden"
                                                                            name="answer"
                                                                            value="{{ $wizzarquestion->answer }}"   required class="form-control" value="{{ old('answer') }}"
                                                                            autofocus="true"
                                                                            checked="checked">
                                                                        <span
                                                                            class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                        <span
                                                                            class="text-secondary-500 text-sm leading-6 capitalize">Si</span>
                                                                    </label>
                                                                </div>
                                                            </label>
                                                            <label>

                                                                <div class="secondary-radio">
                                                                    <label
                                                                        class="flex items-center cursor-pointer">
                                                                        <input type="radio"
                                                                            class="hidden"
                                                                            name="answer"
                                                                            value="{{ $wizzarquestion->answer }}"   required class="form-control" value="{{ old('answer') }}">
                                                                        <span
                                                                            class="flex-none bg-black dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all
                                                                                                duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                                        <span
                                                                            class="text-secondary-500 text-sm leading-6 capitalize">No</span>
                                                                    </label>
                                                                </div>
                                                            </label>
                                                        </label>
                                                    </div>
                                                </fieldset>

                                            </div>

                                            <p>
                                                <div style="text-align: right;">
                                                    <button type="submit" style="margin-right: 18px" class="btn btn-dark">Aceptar</button>
                                                </div>
                                                </p>

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

@endsection

