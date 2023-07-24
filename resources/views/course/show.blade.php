@extends ('menu')
@section('contenido')

    <div class=" space-y-5">
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        <div class="grid grid-cols-12 gap-5 mb-5">


            <div class="card 2xl:col-span-3 lg:col-span-4 col-span-12">

                <div>
                    <center><img style="margin-top: 20px; max-width:300px" src="{{ asset('img') }}/{{ $course->image }}"
                            class="card-img-top img-fluid" alt="Card image">
                    </center>
                </div>

                <div class="card-body" style="margin-left: 20px; margin-right: 20px;">
                    <div>&nbsp; </div>
                    <h5 class="card-title">{{ $course->name_es }}</h5>
                    <div>&nbsp; </div>
                    <p class="card-text">{{ $course->description_es }}</p>
                </div>
                {{--  <div class="card-footer">
                    <a href="{{url('course/')}}/{{$course->id}}" class="btn btn-dark btn-sm float-right">
                    <iconify-icon icon="fluent:edit-32-filled" style="color: white;" width="20"></iconify-icon>
                </a>
                </div> --}}
            </div>

            <div class="card 2xl:col-span-9 lg:col-span-9 col-span-12">
                <div class="card h-full">
                    <div class="card-header">
                        <h4 class="card-title">Materiales</h4>
                        <div>
                            <a href="{{ url('course') }}">
                                <button class="btn btn-dark btn-sm">
                                    <iconify-icon icon="icon-park-solid:back" style="color: white;" width="20">
                                    </iconify-icon>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-6">

                        <!-- BEGIN: Files Card -->


                        <ul class="divide-y divide-slate-100 dark:divide-slate-700">

                            @foreach ($files as $file)
                            <li class="block py-[8px]">
                                <div class="flex space-x-2 rtl:space-x-reverse">
                                    <div class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                        <div class="flex-none">
                                            <div class="h-8 w-8">
                                                @if (substr($file->route, -4) == '.pdf')
                                                    <iconify-icon icon="vscode-icons:file-type-pdf2"
                                                        style="font-size: 32px;"></iconify-icon>
                                                @elseif (substr($file->route, -4) == '.doc' || substr($file->route, -4) == 'docx')
                                                    <iconify-icon icon="vscode-icons:file-type-word"
                                                        style="font-size: 32px;"></iconify-icon>
                                                @elseif (substr($file->route, -4) == '.xls' || substr($file->route, -4) == 'xlsx')
                                                    <iconify-icon icon="vscode-icons:file-type-excel"
                                                        style="font-size: 32px;"></iconify-icon>
                                                @elseif (substr($file->route, -4) == '.jpg' || substr($file->route, -4) == '.png' || substr($file->route, -4) == 'jpge')
                                                    <iconify-icon icon="bi:image-fill"
                                                        style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                @elseif (substr($file->route, -4) == '.zip' || substr($file->route, -4) == '.rar')
                                                    <iconify-icon icon="subway:zip"
                                                        style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                @else
                                                    <iconify-icon icon="mdi:file"
                                                        style="color: #2a3f96; font-size: 32px;"></iconify-icon>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <span class="block text-slate-600 text-sm dark:text-slate-300">
                                                {{ $file->name }}
                                            </span>
                                            {{-- <span class="block font-normal text-xs text-slate-500 mt-1">
                                                {{ date('d/m/Y') }} / 155MB
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="flex-none">
                                        <a href="{{ asset('files') }}/{{ $file->route }}" target="_blank">
                                            <button type="button" class="text-xs text-slate-900 dark:text-white">

                                                Descargar
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                        </ul>
                        <!-- END: FIles Card -->
                    </div>

                    <div class="card-body p-6 embed-responsive embed-responsive-16by">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/QjqsNMjpzFo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
