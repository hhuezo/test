@extends ('menu')
@section('contenido')
    <style>
        .tree {
            min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #fbfbfb;
            /*border: 1px solid #999;*/
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05)
        }

        .tree li {
            list-style-type: none;
            margin: 0;
            padding: 10px 5px 0 55px;
            position: relative;
            min-width: 400px;
        }

        .tree li::before,
        .tree li::after {
            content: '';
            left: 30px;
            position: absolute;
            right: auto
        }

        .tree li::before {
            border-left: 1px solid #999;
            bottom: 50px;
            height: 100%;
            top: 0;
            width: 1px
        }

        .tree li::after {
            border-top: 1px solid #999;
            height: 20px;
            top: 25px;
            width: 25px
        }

        .tree li span {
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border: 1px solid #999;
            border-radius: 5px;
            display: inline-block;
            padding: 3px 8px;
            text-decoration: none;
            min-width: 400px;
        }

        .tree li.parent_li>span {
            cursor: pointer
        }

        .tree>ul>li::before,
        .tree>ul>li::after {
            border: 0
        }

        .tree li:last-child::before {
            height: 30px
        }

        .tree li.parent_li>span:hover,
        .tree li.parent_li>span:hover+ul li span {
            background: #eee;
            border: 1px solid #94a0b4;
            color: #000
        }
    </style>


    <script>
        $(document).ready(function() {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function(e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign')
                        .removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign')
                        .removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });

            // Expande todos los elementos al cargar la página
            $('.tree li.parent_li > span').click();
        });
    </script>




    <div class="tree well card">

        <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
            <div class="flex-1">
                <div class="card-title text-slate-900 dark:text-white">Estructura general</div>
            </div>
        </header>
        <ul>
            @foreach ($regiones as $region)
                <li>
                    <span> {!! $region->cohortes->count() > 0 ? '<iconify-icon icon="entypo:folder"></iconify-icon>' : '' !!} {{ $region->nombre }}</span>
                    @if ($region->cohortes->count() > 0)
                        <ul>
                            @foreach ($region->cohortes as $cohorte)
                                <li>
                                    <span>{!! $cohorte->sedes->count() > 0 ? '<iconify-icon icon="entypo:folder"></iconify-icon>' : '' !!} {{ $cohorte->nombre }}</span> <a href=""></a>

                                    @if ($cohorte->sedes->count() > 0)
                                        <ul>
                                            @foreach ($cohorte->sedes as $sede)
                                                <li>
                                                    <span>{!! $sede->iglesias->count() > 0 ? '<iconify-icon icon="entypo:folder"></iconify-icon>' : '' !!} {{ $sede->nombre }}</span>

                                                    @if ($sede->iglesias->count() > 0)
                                                        <ul>
                                                            @foreach ($sede->iglesias as $iglesia)
                                                                <li>
                                                                    <a
                                                                        href="{{ url('catalog/iglesia') }}/{{ $iglesia->id }}/edit">
                                                                        <span> {{ $iglesia->name }}</span>
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

        </ul>
    </div>
@endsection
