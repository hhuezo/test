@extends ('menu')
@section('contenido')
    <div class="grid grid-cols-12 gap-5 mb-5">

        <style>
            .form-label{
                text-transform: none;
            }
        </style>

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Resuelve la prueba

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
                        @foreach ($questions as $question)
                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-7">
                                <div class="input-area relative">
                                    <label for="largeInput"
                                        class="form-label"><strong>{{ $question->description }}</strong></label>
                                    @foreach ($answers as $answer)
                                        @if ($question->id == $answer->catalog_questions_id)
                                            <div class="flex items-center space-x-2">
                                                <label
                                                    class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                    <input type="checkbox" value=""
                                                        class="sr-only peer">
                                                    <span
                                                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
                                                </label>
                                                <span class="text-sm text-slate-600 font-Inter font-normal">{{ $answer->description }}</span>

                                            </div>
                                            <br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <div style="text-align: center;">
                            <a href="{{ url('organization') }}">
                                <button type="button" class="btn inline-flex justify-center btn-dark">Cancelar</button>
                            </a>
                            &nbsp;
                            <button type="button" data-bs-toggle="modal" data-bs-target="#successModal"
                                class="btn inline-flex justify-center btn-success">Aceptar</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
