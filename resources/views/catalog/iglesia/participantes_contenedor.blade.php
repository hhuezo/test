<div class="flex flex-col justify-between min-h-screen">

    <style>
        .draggable-item {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px 0;
            cursor: move;
        }

        .ui-draggable-dragging {
            z-index: 1000;
        }
    </style>

    <!-- END: Header -->
    <!-- END: Header -->
    <div class="content-wrapper transition-all duration-150" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div class="space-y-5 profile-page">
                        <div class="grid grid-cols-12 gap-6">

                            @foreach ($grupos as $grupo)
                                <div class="lg:col-span-3 col-span-6 column" id="c{{ $grupo->id }}">
                                    <div class="card h-full">
                                        <header class="card-header">
                                            <h4 class="card-title">{{ $grupo->nombre }}</h4>
                                        </header>
                                        <div class="card-body p-6">
                                            @foreach ($participantes as $participante)
                                                @if ($participante->group_id == $grupo->id)
                                                    <div class="draggable-item" data-id="{{ $participante->id }}">
                                                        {{ $participante->nombre }}</div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="grid grid-cols-12 gap-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script>
        $(document).ready(function() {

            $('.draggable-item').draggable({
                /* helper: 'original', // Cambiado a 'original'
                 revert: 'invalid',*/
                helper: 'clone',
                revert: false,
                start: function(event, ui) {
                    ui.helper.addClass('dragging');
                },
                stop: function(event, ui) {
                    ui.helper.removeClass('dragging');
                }
            });

            $('.column').droppable({
                accept: '.draggable-item',
                drop: function(event, ui) {
                    var droppedItem = ui.helper;
                    var originalItem = ui.helper;

                    if (!originalItem.hasClass('cloned')) {
                        originalItem.remove();
                    }

                    $(this).find('.cloned').remove();

                    var clonedItem = droppedItem.addClass('cloned');
                    $(this).append(clonedItem);

                    // Capturar el id del item y el id de la columna
                    var participanteId = clonedItem.data('id');
                    var grupoId = $(this).attr('id');

                    //console.log(grupoId);

                    $.ajax({
                        url: "{{ url('catalog/iglesia/set_grupo') }}/" + participanteId + '/' +
                            grupoId,
                        type: 'GET',
                        success: function(response) {
                            console.log('Request successful:', response);
                            getParticipantes();
                        },
                        error: function(error) {
                            console.error('Error:', error);
                        }
                    });




                }
            });
        });
    </script>









</div>
