<?php
    $areaChartData = [ 1000,2000,3000,4000,5000,4000,3000,6000,7000 ];
    $month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
    echo "got to Chart1.tpl'; exit(0);
?>
<!-- Begin Chart One TPL -->

            <div class="card z-depth-1-half" id="chart1Top">
                <div class="card-content hoverable">
                    <span class="card-title">Site Visits By Day (pick a month)</span>
                    <div class="input-field">
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
        var updateChart1 = function () {
            // base uri
            var uri = '<?= $siteurl ?>?url=api/Charts';

            var year = '2016';
            var month = '1';

            if (year)
                uri += '&year=' + encodeURIComponent(year);

            if (month)
                uri += '&month=' + encodeURIComponent(month);

            var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#chart1");

            // ajax
            console.log(uri);
            var monthsData;
            $.get(uri)

                    .done(function (data) {
                        // save for later...
                        monthsData = data.Chart1;
                        console.log(monthsData);

                    })

                    .fail(function () {
                        ($('<H1>').text('Error loading data.')
                        ).appendTo('#chart1');
                        alert('Fail');
                    })

                    .always(function (data) {
                        $loading.remove();
                        alert('Always');
                    });
        };
        updateChart1();
    });

    google.load("visualization", "1", {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('number','Day');
        data.addColumn('number', 'Hits');
        data.addRows(monthsData);
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
    var chart = new google.visualization.AreaChart(document.getElementById('chart1'));
    chart.draw(data,options);
     }
</script>