@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <div class="grid grid-cols-12 gap-5 mb-5">

        <div class="2xl:col-span-12 lg:col-span-12 col-span-12">
            <div class="card">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Modificar Respuestas iglesia  {{$iglesia->name}}

                                <a href="{{ url('catalog/answerreg/') }}">
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
                                        <form method="POST" action="{{ url('catalog/answerreg/edit') }}">
                                            @csrf
                                            <table id="myTable" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr class="td-table">
                                                        <th style="text-align: center">Id</th>
                                                        <th style="text-align: center">Pregunta</th>
                                                        <th style="text-align: center">Respuesta</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($wizzarquestion as $obj1)
                                                    <tr>
                                                        <td align="center">{{ $obj1->id }}</td>
                                                        @foreach ( $wizzaranswer as $obj2)
                                                        @if ($obj1->id==$obj2->question_id  )
                                                        <td align="center">{{ $obj1->question }}</td>
                                                        <td align="center">
                                                            @if ($obj2->answer == 1)
                                                            <input
                                                            type="radio"
                                                            id="answer"
                                                            name="answer"
                                                            value="answer"
                                                            checked />
                                                           @elseif ($obj2->answer == 0)
                                                            <input
                                                            type="radio"
                                                            id="answer2"
                                                            name="answer2"
                                                            value="answer2" />
                                                            @endif
                                                        </td>

                                                        @endif
                                                        @endforeach


                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            </table>
                                            <div> &nbsp;&nbsp;</div>
                                            &nbsp;&nbsp;
                                            <div> &nbsp;&nbsp;</div>
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

@endsection
