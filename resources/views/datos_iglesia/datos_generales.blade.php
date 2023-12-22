
@extends ('menu')
@section('contenido')


    <style>
        .tree {
            /* min-height: 20px;
            padding: 19px;
            margin-bottom: 20px;
            background-color: #fbfbfb;
            border: 1px solid #999;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05) */
        }

        .tree li {
            list-style-type: none;
            margin: 0;
            /* padding: 10px 5px 0 5px; */
            padding: 10px 5px 0 60px;
            position: relative
        }

        .tree li::before,
        .tree li::after {
            content: '';
            /* left: -20px; */
            left: 35px;
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
            text-decoration: none
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
        $(function() {
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
        });
    </script>








    {{-- <div class="todo-sidebar">
        <div class="h-full card">
            <div class="card-body py-6 h-full flex flex-col">
                <div class="h-full px-6 " data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px -24px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                    <div class="simplebar-content tree well" style="padding: 0px 24px;">
                                        <ul class="todo-categories list mt-6">

                                            <!-- BEGIN: Top Filter -->

                                            @foreach ($regiones as $region)
                                                <li class="email-categorie-list" data-status="stared">
                                                    <label>
                                                        <span class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                                            <span class="text-xl">
                                                                <iconify-icon
                                                                    icon="material-symbols:folder-open"></iconify-icon>
                                                            </span>
                                                            <span class="capitalize text-sm">
                                                                {{ $region->nombre }}
                                                            </span>
                                                        </span>

                                                    </label>

                                                    <ul>
                                                        @foreach ($region->departamentos as $departamento)
                                                            <li class="email-categorie-list" data-status="stared">
                                                                <label>
                                                                    <span class="flex-1 flex space-x-2 rtl:space-x-reverse">
                                                                        <span class="text-xl">
                                                                            <iconify-icon
                                                                                icon="material-symbols:folder-open"></iconify-icon>
                                                                        </span>
                                                                        <span class="capitalize text-sm">
                                                                            {{ $departamento->nombre }}
                                                                        </span>
                                                                    </span>

                                                                </label>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 427px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}















   <div class="h-full card">
        <div class="card-body py-6 h-full flex flex-col">
            <div id="content_layout">
    <div class="tree well">
        <ul>
            @foreach ($regiones as $region)
                <li style="padding: 10px 5px 0 10px; !important">
                    <span><iconify-icon icon="material-symbols:folder-open"></iconify-icon>
                        {{ $region->nombre }}</span>
                    <ul>
                        @foreach ($region->cohortes as $cohorte)
                            <li>
                                <span><iconify-icon
                                        icon="material-symbols:add-box"></iconify-icon>{{ $cohorte->nombre }}</span>
                                <ul>
                                    @foreach ($cohorte->sedes as $sede)
                                        <li>
                                            <span><iconify-icon
                                                    icon="material-symbols:add-box"></iconify-icon>{{ $sede->nombre }}</span>


                                            <ul>
                                                @foreach ($sede->iglesias as $iglesia)
                                                    <li>
                                                        <span><iconify-icon
                                                                icon="material-symbols:add-box"></iconify-icon>{{ $iglesia->name }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </li>
                                    @endforeach
                                </ul>

                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>




    {{-- <div class="tree well">
    <ul>
        <li>
            <span><iconify-icon icon="material-symbols:folder-open"></iconify-icon> Parent</span> <a href="">Goes
                somewhere</a>
            <ul>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>
                    <ul>
                        <li>
                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>
                    <ul>
                        <li>
                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                        <li>
                            <span><i class="icon-minus-sign"></i> Grand Child</span> <a href="">Goes
                                somewhere</a>
                            <ul>
                                <li>
                                    <span><i class="icon-minus-sign"></i> Great Grand Child</span> <a href="">Goes
                                        somewhere</a>
                                    <ul>
                                        <li>
                                            <span><i class="icon-leaf"></i> Great great Grand Child</span> <a
                                                href="">Goes somewhere</a>
                                        </li>
                                        <li>
                                            <span><i class="icon-leaf"></i> Great great Grand Child</span> <a
                                                href="">Goes somewhere</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes
                                        somewhere</a>
                                </li>
                                <li>
                                    <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes
                                        somewhere</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <span><i class="icon-folder-open"></i> Parent2</span> <a href="">Goes somewhere</a>
            <ul>
                <li>
                    <span><i class="icon-leaf"></i> Child</span> <a href="">Goes somewhere</a>
                </li>
            </ul>
        </li>
    </ul>
    </div> --}}

    {{-- <div class="tree">
        <ul>
            <li>
                <span><i class="icon-calendar"></i> 2013, Week 2</span>
                <ul>
                    <li>
                        <span class="badge badge-success"><i class="icon-minus-sign"></i> Monday, January 7: 8.00
                            hours</span>
                        <ul>
                            <li>
                                <a href=""><span><i class="icon-time"></i> 8.00</span> &ndash; Changed CSS to
                                    accomodate...</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span class="badge badge-success"><i class="icon-minus-sign"></i> Tuesday, January 8: 8.00
                            hours</span>
                        <ul>
                            <li>
                                <span><i class="icon-time"></i> 6.00</span> &ndash; <a href="">Altered code...</a>
                            </li>
                            <li>
                                <span><i class="icon-time"></i> 2.00</span> &ndash; <a href="">Simplified our
                                    approach to...</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span class="badge badge-warning"><i class="icon-minus-sign"></i> Wednesday, January 9: 6.00
                            hours</span>
                        <ul>
                            <li>
                                <a href=""><span><i class="icon-time"></i> 3.00</span> &ndash; Fixed bug caused
                                    by...</a>
                            </li>
                            <li>
                                <a href=""><span><i class="icon-time"></i> 3.00</span> &ndash; Comitting latest
                                    code
                                    to Git...</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span class="badge badge-important"><i class="icon-minus-sign"></i> Wednesday, January 9: 4.00
                            hours</span>
                        <ul>
                            <li>
                                <a href=""><span><i class="icon-time"></i> 2.00</span> &ndash; Create component
                                    that...</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <span><i class="icon-calendar"></i> 2013, Week 3</span>
                <ul>
                    <li>
                        <span class="badge badge-success"><i class="icon-minus-sign"></i> Monday, January 14: 8.00
                            hours</span>
                        <ul>
                            <li>
                                <span><i class="icon-time"></i> 7.75</span> &ndash; <a href="">Writing
                                    documentation...</a>
                            </li>
                            <li>
                                <span><i class="icon-time"></i> 0.25</span> &ndash; <a href="">Reverting code back
                                    to...</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div> --}}

    @endsection
