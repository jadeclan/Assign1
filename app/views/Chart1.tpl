<?php
    $areaChartData = [ 1000,2000,3000,4000,5000,4000,3000,6000,7000 ];
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
                echo '['.$i.', '.(int)$areaChartData[$i].']';
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