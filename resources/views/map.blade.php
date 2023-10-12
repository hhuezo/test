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
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Workers'],
            ['{{ $dep }}', 1], // San salvador
            //['HN', 0], //honduras
            // ['SV-SM',2]// Add more countries and worker data as needed
        ]);

        var geoChart = new google.visualization.GeoChart(document.getElementById('chart2'));

        var options = {
            region: 'SV',
            displayMode: 'regions',
            resolution: 'provinces',
            colorAxis: {
                colors: ['#8598AD', '#2763FF'] //escala del color de los datos
            },
            chartArea: {
                fontFamily: 'Roboto'
            }
        };


        google.visualization.events.addListener(geoChart, 'regionClick', function(event) {
            //event.style.background = '#fff';
            //console.log(event);
            var provinceID = event.region;
            get_map(provinceID);
            document.getElementById('departamento').value = provinceID;
            //console.log('Province ID: ' + provinceID);
            // Puedes hacer lo que quieras con el ID de la provincia aquí
        });



        geoChart.draw(data, options);
    };
</script>
</body>

</html>
