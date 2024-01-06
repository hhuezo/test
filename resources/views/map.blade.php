<div class="map-container">
    <div id="chart2"
        style="display: flex;
                    justify-content: center;
                    align-items: center;  width: 100%;">
    </div>
</div>

<script>
    google.charts.load('current', {
        'packages': ['geochart']
    });




    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {

        var departamentos = {
            "SV-AH": "Ahuachapán",
            "SV-SA": "Santa Ana",
            "SV-SO": "Sonsonate",
            "SV-CH": "Chalatenango",
            "SV-LI": "La Libertad",
            "SV-SS": "San Salvador",
            "SV-CU": "Cuscatlán",
            "SV-PA": "La Paz",
            "SV-SV": "San Vicente",
            "SV-CA": "Cabañas",
            "SV-US": "Usulután",
            "SV-SM": "San Miguel",
            "SV-MO": "Morazán",
            "SV-UN": "La Unión"
        };
        //console.log(departamentos["{{ $dep }}"]);
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Tooltip'],
            ['{{ $dep }}', departamentos["{{ $dep }}"]],
        ]);

        var geoChart = new google.visualization.GeoChart(document.getElementById('chart2'));

        var options = {
            //width: 600, // Ancho en píxeles
            height: 500, // Alto en píxeles
            region: 'SV',
            displayMode: 'regions',
            resolution: 'provinces',
            colorAxis: {
                colors: ['#8598AD', '#2763FF'] //escala del color de los datos
            },
            chartArea: {
                fontFamily: 'Roboto'
            },
            tooltip: {
                textStyle: {
                    color: 'green' // Cambia el color del texto del tooltip
                },
                isHtml: true // Si quieres usar HTML en el tooltip
            }
        };


        google.visualization.events.addListener(geoChart, 'regionClick', function(event) {
            //event.style.background = '#fff';
            //console.log(event);
            var provinceID = event.region;
            get_map(provinceID);
            $.ajax({
                url: "{{ url('get_dep') }}/" + provinceID, // La URL de la solicitud
                type: "GET", // Método de la solicitud (GET en este caso)
                //dataType: "json", // Tipo de datos esperados en la respuesta (puedes ajustarlo según tus necesidades)

                // Función que se ejecuta cuando la solicitud es exitosa
                success: function(data) {
                    console.log(data);
                    // Pintar la respuesta en el div_result
                    document.getElementById('departamento').value = data.id;
                    document.getElementById('departamento_show').value = data.nombre;
                },

                // Función que se ejecuta si la solicitud falla
                error: function(xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", status, error);
                }
            });
            // document.getElementById('departamento').value = provinceID;
            //console.log('Province ID: ' + provinceID);
            // Puedes hacer lo que quieras con el ID de la provincia aquí
        });



        geoChart.draw(data, options);
    };
</script>
</body>

</html>
