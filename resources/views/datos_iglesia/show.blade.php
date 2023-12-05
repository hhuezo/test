@extends ('menu')
@section('contenido')
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



    <div id="contenedor">

    </div>



    <script>
        $(document).ready(function() {

            getParticipantes();

            $('.draggable-item').draggable({
                helper: 'original', // Cambiado a 'original'
                revert: 'invalid',
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



        function getParticipantes() {
            $.ajax({
                url: "{{ url('administracion/datos_iglesia/get_participantes') }}/" + {{ $iglesia->id }},
                type: 'GET',
                success: function(response) {
                    //console.log('Request successful:', response);
                    $('#contenedor').html(response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
@endsection
