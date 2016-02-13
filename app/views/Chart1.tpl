<?php
    $areaChartData = [  {day:1,hits:1000},{day:2,hits:2000},
                        {day:3,hits:3000},{day:4,hits:4000},
                        {day:5,hits:1000},{day:6,hits:2000},
                        {day:7,hits:3000},{day:8,hits:4000} ];
?>
<!-- Begin Chart One TPL -->

            <div class="card" id="chart1Div">

            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('number','Day');
        data.addColumn('number', 'Hits');
        var areaChartData =data.addRows(<?php
            echo '['.PHP_EOL;
            for($i=0; $i<count($areaChartData);$i++){
                echo '['.(int)$areaChartData[$i]['day'].', '.(int)$areaChartData[$i]['hits'].']';
                if($i != count($areaChartData)-1){echo ', '.PHP_EOL;}
            }
            echo PHP_EOL . ']';
            ?>);
    var options = {
        theme: 'maximized',
        legend: { position: 'bottom' },
        hAxis: {
        title: 'Day of Month'
    },
        vAxis: {
        title: 'Number of Visits'
    }
    }
    var chart = new google.visualization.AreaChart(document.getElementById('chart1Div'));
    chart.draw(data,options);
     }
</script>