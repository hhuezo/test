@extends ('menu')
@section('contenido')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="div_result" class="grid xl:grid-cols-1 grid-cols-1 gap-6">

    </div>



    <script>
        google.charts.load('current', {
            'packages': ['geochart']
        });

        $(document).ready(function() {
            get_map('A');
        });


        function get_map(dep) {
            //console.log(dep);
            // Realizar la solicitud AJAX
            $.ajax({
                url: "{{ url('get_map') }}/" + dep, // La URL de la solicitud
                type: "GET", // Método de la solicitud (GET en este caso)
                //dataType: "json", // Tipo de datos esperados en la respuesta (puedes ajustarlo según tus necesidades)

                // Función que se ejecuta cuando la solicitud es exitosa
                success: function(data) {
                    //console.log(data);
                    // Pintar la respuesta en el div_result
                    $("#div_result").html(data);
                },

                // Función que se ejecuta si la solicitud falla
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                }
            });
        }
    </script>
@endsection
