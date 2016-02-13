<!-- Begin Chart Of Three TPL -->
<div class="card" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Geo Chart</span>
        <div id="chart3Div">
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['geochart']});
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Visits'],
            ['Canada', 10],
            ['United States', 300],
            ['Brazil', 600],
            ['RU', 1000],
            ['Austraila', 800]
        ]);

        var options = {
            colorAxis: {colors: ['#f48fb1', '#c51162', '#880e4f']},
            defaultColor: '#f5f5f5'
        };

        var chart = new google.visualization.GeoChart(document.getElementById('chart3Div'));

        chart.draw(data, options);
    }
</script>


<!-- End of Chart of Chart3 -->