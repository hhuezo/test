@extends ('menu')
@section('contenido')
<div class="grid grid-cols-12 gap-5 mb-5">


    <div class="2xl:col-span-12 lg:col-span-12 col-span-12">

        <div class="card">
            <div class="card-body flex flex-col p-6">
                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                    <div class="flex-1">
                        <div class="card-title text-slate-900 dark:text-white">Certificación</div>
                    </div>
                </header>
                <div class="card-text h-full ">
                    <div>
                        <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-home" class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300" id="tabs-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-home" role="tab" aria-controls="tabs-home" aria-selected="true">Iglesias Certificadas</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="#tabs-profile" class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile" role="tab" aria-controls="tabs-profile" aria-selected="false">Iglesias no Certificadas</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tabs-tabContent">

                            <div class="tab-pane fade show active" id="tabs-home" role="tabpanel" aria-labelledby="tabs-home-tab">
                                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Listado de Iglesias</div>
                                    </div>
                                </header>
                                <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class="bg-slate-200 dark:bg-slate-700">
                                        <tr>
                                            <th scope="col" class=" table-th ">
                                                Nombre
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Sede
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Cohort
                                            </th>
                                            <th scope="col" class=" table-th ">
                                                Region
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                        @foreach ($iglesias as $iglesia)
                                        <tr class="even:bg-slate-50 dark:even:bg-slate-700">
                                            <td class="table-td">{{$iglesia->nombreIglesia}}</td>
                                            <td class="table-td">{{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->nombre}}</td>
                                            <td class="table-td">{{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->cohorte->nombre}}</td>
                                            <td class="table-td">{{$iglesia->sede_id == null ? '': $iglesia->sedeiglesia->cohorte->region->nombre}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="tabs-profile" role="tabpanel" aria-labelledby="tabs-profile-tab">
                                <p class="text-sm text-gray-500 dark:text-gray-200">
                                    This is some placeholder content the
                                    <strong>Profile</strong>
                                    tab's associated content. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. consectetur adipisicing elit. Ab ipsa!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection