<?php
    $areaChartData = [ 1000,2000,3000,4000,5000,4000,3000,6000,7000 ];
    ?>
<!-- Begin Chart One TPL -->

            <div class="card z-depth-1-half" id="chart1Top">
                <div class="card-content hoverable">
                    <span class="card-title">Site Visits By Day</span>
                    <div class="input-field">
                        <!--TODO add drop down for choosing a year -->
                        <select id="mSelect" name="chosenMonth" class="initialized" style="display:block;">
                        </select>
                    </div>

                    <div id="chart1">
                    <!-- Google Script Will Populate this Div with Graph -->
                    </div>
                </div>
            </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
    google.load("visualization", "1", {packages:['corechart']});
    google.setOnLoadCallback(drawChart);
    var months = [["January", "February", "March", "April",
        "May", "June", "July", "August",
        "September", "October", "November", "December"],
          [31,28,31,30,31,30,31,31,30,31,30,31]]  ;
    var chart1Year = '2016';
    var chart1Month = '1';
    var chart1Title;
    var monthsData;
    var dataToGraph = new Array(31);
    for (var i=0;i<dataToGraph.length;i++){
        dataToGraph[i] = new Array(2);
    }

    $(function() {

        $('#mSelect').on('change',function(e) {

            chart1Month = e.target.value;
            updateChart1();
        });

        function updateChart1() {

            // base uri
            var uri = '<?= $siteurl ?>?url=api/chart1';

            if (chart1Year)
                uri += '&year=' + encodeURIComponent(chart1Year);
            if (chart1Month)
                uri += '&month=' + encodeURIComponent(chart1Month);

            chart1Title = months[0][chart1Month-1] + ', ' + chart1Year;

            var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#chart1");

            // ajax

            $.get(uri)

                    .done(function (data) {
                        // save for later...
                        monthsData = data;
                        monthsData2= JSON.stringify(monthsData);
                        //TODO Check for no rows
                        //TODO Check to see if monthsData array needs to have all
                        //     days of the month if no data is available.
                        for (var i= 0; i<monthsData.length;i++){
                            dataToGraph[i][0]=parseInt(monthsData[i]['day']);
                            dataToGraph[i][1]=parseInt(monthsData[i]['monthDailyVisits']);
                        }
                    })

                    .fail(function () {
                        ($('<H1>').text('Error loading data.')
                        ).appendTo('#chart1');
                    })

                    .always(function (data) {
                        $loading.remove();
                    });
        }
        updateChart1();
    })

    $(function(){

        var node = $('#mSelect');
        for(var i=0;i<months[0].length;i++){
            var newOption = document.createElement('option');
            newOption.setAttribute('value',i+1);
            newOption.innerText=months[0][i];
            if(i == 0){newOption.selected=true;}
                node.append(newOption);
        }
    });

    function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('number', 'Day');
        data.addColumn('number', 'Hits');
        data.addRows(dataToGraph);
        var options = {
        theme: 'maximized',
        title: chart1Title,
        legend: {position: 'bottom' },
        hAxis: {title: 'Day of Month' },
        vAxis: {title: 'Number of Visits' }
    }
    var chart = new google.visualization.AreaChart(document.getElementById('chart1'));
        chart.draw(data,options);
    }
</script>

<!--
<?php
    echo '['.PHP_EOL;
    for($i=0; $i
        <count($areaChartData);$i++){
        echo '['.$i.', '.(int)$areaChartData[$i].']';
        if($i != count($areaChartData)-1){echo ', '.PHP_EOL;}
    }
    echo PHP_EOL . ']';
    ?>

            /*$day = 0;
        for($i=0; $i<$result.length ;$i++){
            $day +=1;
            while ($result[$i]['day'] != $day) {
                $resultsArray[1] = 0;
                $resultsArray[1][$day] = $day;
                $day += 1;
            }
            $resultsArray[0][$day] = $result[0][$day];
            $resultsArray[1][$day] = $day;
        }*/

 -->