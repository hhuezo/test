<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoChart Example</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card">
                <div style="text-align: center; font-family: 'Roboto'; font-weight: 550; margin-top: 3%;">Workers per
                    Country</div>
                <div class="map-container">
                    <div id="chart2" style="display: flex;
                    justify-content: center;
                    align-items: center;  width: 100%; min-height: 750px;">
                    </div>
                </div>
                <div id="info"></div>
            </div>
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
                ['SV-SS', 2], // San salvador
                ['HN', 0], //honduras
               // ['SV-SM',2]// Add more countries and worker data as needed
            ]);

            var geoChart = new google.visualization.GeoChart(document.getElementById('chart2'));

            var options = {
                region: 'SV',
                displayMode: 'regions',
                resolution: 'provinces',
                colorAxis: {
                   colors: ['#8598AD', '#2763FF']   //escala del color de los datos 
                },
                chartArea: {
                    fontFamily: 'Roboto'
                }
            };
            

            google.visualization.events.addListener(geoChart, 'regionClick', function (event) {
                event.style.background = '#fff';
                console.log(event);
                var provinceID = event.region;
               alert('Province ID: ' + provinceID);
                // Puedes hacer lo que quieras con el ID de la provincia aquí
            });

            

            geoChart.draw(data, options);
        };
    </script>
</body>

</html>
