@extends ('menu')
@section('contenido')
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<div class="grid grid-cols-12 gap-5 mb-5">

    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Respuestas
                            <a href="{{ url('catalog/answer') }}">
                                <button class="btn btn-dark btn-sm float-right">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="18">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                    </div>
                </header>

                <div class="space-y-4">
                    <form method="POST" action="{{ route('answer.update', $answer->id) }}">
                        @method('PUT')
                        @csrf

                        <div class="input-area relative pl-28">
                            <label for="largeInput" class="inline-inputLabel">Descripcion</label>
                            <input type="text" name="description" value="{{ $answer->description }}" required class="form-control">
                        </div> &nbsp;
                        <div>
                            <div class="input-area relative pl-28">
                                <label for="largeInput" class="inline-inputLabel">Pregunta</label>
                                <select name="catalog_questions_id" class="form-control select2">
                                    @foreach ($questions as $obj)
                                    @if ($obj->id == $answer->catalog_questions_id)
                                    <option value="{{ $obj->id }}" selected> {{ $obj->description }}
                                    </option>
                                    @else
                                    <option value="{{ $obj->id }}">{{ $obj->description }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>&nbsp;


                            <div class="input-area relative pl-28">Respuesta
                                @if ($answer->correct_answer == 1)
                                <input type="checkbox" name="correct_answer" value='1' checked='true'>
                                @else
                                <input type="checkbox" name="correct_answer" value='1'>
                                @endif
                                </p>
                                <label for="largeInput" class="inline-inputLabel"></label>
                            </div>
                            <div></div>
                            &nbsp;
                            <div class=" items-center p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                <button style="margin-bottom: 15px" class="btn inline-flex justify-center btn-dark ml-28 float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div>&nbsp;</div>
@endsection