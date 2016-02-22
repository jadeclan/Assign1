<!-- Begin Chart Of Three TPL -->
<div class="card" id="card2">

    <div class="card-content hoverable">
        <div class="row"><span class="card-title">Visits per Country Column Chart</span></div>

        <!--Dropdown list for top 10 countries -->
        <div class="row">
            <div class="col s12 m4">
                <select id="countries1" name="firstCountryPicked">
                    <option value="" disabled selected>First Country</option>
                </select>
            </div>
            <div class="col s12 m4">
                <select id="countries2" name="SecondCountryPicked">
                    <option value="" disabled selected>Second Country</option>
                </select>
            </div>
            <div class="col s12 m4">
                <select id="countries3" name="ThirdCountryPicked">
                    <option value="" disabled selected>Third Country</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <button id="theButton" class="btn waves-effect waves-light btn-large" type="submit" name="action">Chart It <!--<i class="material-icons right">send</i>-->
                </button>
            </div>
        </div>
        <div class="row">
            <div id="loadable"></div>
            <div id="noChart3Data"></div>
            <div id="chart3" style="width: 100%; height: 100%;">
                <!-- Google Script Will Populate this Div with Graph -->
            </div>
            <div class="col s12 center-align" id="switch">
                <label>Switch X Axis</label>
                <div class="switch"><label>Country<input type="checkbox" checked><span class="lever"></span>Months</label></div>
            </div>
        </div>
    </div>

</div>
<!-- End of Chart of Chart3 -->
<script type="text/javascript">

    $(function() {
        // populate drop downs
        $.get('<?= $siteurl ?>?url=api/countries/topten')
                .done(function (data) {
                    data.forEach(function (country) {
                        $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries1');
                        $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries2');
                        $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries3');
                    });
                    $('#countries1').material_select();
                    $('#countries2').material_select();
                    $('#countries3').material_select();
                });

        var drawChart = function() {
            $('#switch').show();

            var $country1 = $('#countries1').val();
            var $country2 = $('#countries2').val();
            var $country3 = $('#countries3').val();

            var uri = '<?= $siteurl ?>?url=api/chart3';
            if ($country1)
                uri += '&country1=' + encodeURIComponent($country1);
            if ($country2)
                uri += '&country2=' + encodeURIComponent($country2);
            if ($country3)
                uri += '&country3=' + encodeURIComponent($country3);

            var $loading = $('<div class="progress">').append($('<div class="indeterminate">')).appendTo("#loadable");

            $.get(uri)
                .done(function(data) {

                    var chart3DataTable = [['Country', 'Jan', 'May', 'Sept']];

//                    var monthChart = [
//                        ['Month', 'Brazil','China','France'],
//                        ['Jan',217,243,564],
//                        ['May',2324,323,643],
//                        ['Sept',2347,4543,5264]
//                    ];

                    var monthChart = [['Month']];
                    console.log(monthChart);


                    data.forEach(function(item) {
                        chart3DataTable.push([item.countryName, parseInt(item.Jan), parseInt(item.May), parseInt(item.Sept)]);
                    });

                    data.forEach(function(item) {
                        monthChart[0].push(item.countryName);

                    });

                    monthChart.push(["Jan"]);
                    monthChart.push(["Aug"]);
                    monthChart.push(["Sept"]);


                    monthChart[1].push(chart3DataTable[1][1]);
                    monthChart[1].push(chart3DataTable[1][2]);
                    monthChart[1].push(chart3DataTable[1][3]);
                    monthChart[2].push(chart3DataTable[2][1]);
                    monthChart[2].push(chart3DataTable[2][2]);
                    monthChart[2].push(chart3DataTable[2][3]);
                    monthChart[3].push(chart3DataTable[3][1]);
                    monthChart[3].push(chart3DataTable[3][2]);
                    monthChart[3].push(chart3DataTable[3][3]);


                    chart3DataTable = google.visualization.arrayToDataTable(chart3DataTable);
                    monthChart = google.visualization.arrayToDataTable(monthChart);


                    var options = {
                        chart: {
                            title: 'Site Visits',
                            subtitle:'2016',
                        },
                        hAxis: {
                            title: 'Country',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Total Visits'
                        }
                    };

                    var monthOptions = {
                        chart: {
                            title: 'Site Visits',
                            subtitle:'2016',
                        },
                        hAxis: {
                            title: 'Months',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Total Visits'
                        }
                    };

                    function drawDefaultChart(){
                        chart3DataTable = google.visualization.arrayToDataTable(chart3DataTable);
                        var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));
                        chart.draw(chart3DataTable, options);
                        $('.switch').on('click', drawMonthChart() );
                    }


                        $('.switch').on('click', function() {



                            var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));
                            chart.draw(monthChart, monthOptions);
                        });

                    var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));
                    chart.draw(chart3DataTable, options);

                    //var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));
                    //chart.draw(monthChart, monthOptions);

                    //monthChart = google.visualization.arrayToDataTable(monthChart);
                    //var chart = new google.visualization.ColumnChart(document.getElementById('chart3'));

                })
                .fail(function () {
                    $('div').append($('span').text('Error loading data.').appendTo('#chart3'));
                })
                .always(function () {
                    $loading.remove();
                });
        };

        $('#theButton').on('click', drawChart);
        $('#switch').hide();
    });
</script>