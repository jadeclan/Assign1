<?php
    $areaChartData = [ 1000,2000,3000,4000,5000,4000,3000,6000,7000 ];
            $month_names = ["January","February","March","April",
                           "May","June","July","August",
                           "September","October","November","December"];
    ?>
<!-- Begin Chart One TPL -->

            <div class="card z-depth-1-half" id="chart1Top">
                <div class="card-content hoverable">
                    <span class="card-title">Site Visits By Day</span>
                    <div class="input-field">
                        <!--TODO add drop down for choosing a year -->
                        <select id="mSelect" name="chosenMonth" class="initialized" style="display:block;">
                            <?php
                                echo '<option value=0 selected>' . $month_names[0] .'</option>';
                                for($i=1;$i<12;$i++){
                                    echo '<option value=' . $i . '>'.$month_names[$i].'</option>';
                                };
                            ?>
                        </select>
                    </div>

                    <div id="chart1">
                    <!-- Google Script Will Populate this Div with Graph -->
                    </div>
                </div>
            </div>

<script>
    $(function() {
        var month_names = ["January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"];
        var chart1Year = '2016';
        var chart1Month = '1';
        var chart1Title;
        var monthsData;

        var updateChart1 = function () {
            // base uri
            var uri = '<?= $siteurl ?>?url=api/chart1';

            if (chart1Year)
                uri += '&year=' + encodeURIComponent(chart1Year);

            if (chart1Month)
                uri += '&month=' + encodeURIComponent(chart1Month);

            chart1Title = month_names[chart1Month - 1];

            var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#chart1");

            // ajax

            $.get(uri)

                    .done(function (data) {
                        // save for later...
                        monthsData = data;
                        //TODO Check for no rows
                        //TODO Check to see if monthsData array needs to have all
                        //     days of the month if no data is available.

                    })

                    .fail(function () {
                        ($('<H1>').text('Error loading data.')
                        ).appendTo('#chart1');
                    })

                    .always(function (data) {
                        $loading.remove();
                    });
        };
    })
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('number', 'Day');
        data.addColumn('number', 'Hits');
        var areaChartData = data.addRows(<?php
    echo '['.PHP_EOL;
    for($i=0; $i
        <count($areaChartData);$i++){
        echo '['.$i.', '.(int)$areaChartData[$i].']';
        if($i != count($areaChartData)-1){echo ', '.PHP_EOL;}
    }
    echo PHP_EOL . ']';
    ?>);
    var options = {
        theme: 'maximized',
        legend: {position: 'bottom' },
        hAxis: {title: 'Day of Month' },
        vAxis: {title: 'Number of Visits' }
    }
    var chart = new google.visualization.AreaChart(document.getElementById('chart1'));
        chart.draw(data,options);
    }
</script>