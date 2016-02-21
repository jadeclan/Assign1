<!-- Begin Chart Of Three TPL -->
<div class="card" id="chart3Div">

    <div class="card-content hoverable">
        <div class="row"><span class="card-title">Column Chart - Visits per Country</span></div>

        <!--Dropdown list for top 10 countries -->
        <div class="row">
            <div class="col s3">
                <select id="countries1" name="firstCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select First Country</option>
                </select>
            </div>
            <div class="col s3">
                <select id="countries2" name="SecondCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select Second Country</option>
                </select>
            </div>
            <div class="col s3">
                <select id="countries3" name="ThirdCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select Third Country</option>
                </select>
            </div>
            <div class="col s3 center-align">
                <button id="theButton" class="btn waves-effect waves-light btn-large" type="submit" name="action">Chart It
                    <!--<i class="material-icons right">send</i>-->
                </button>
            </div>
        </div>
        <div class="row">
            <div id="loadable"></div>
            <div id="noChart3Data"></div>
            <div id="chart3" style="width: 900px; height: 500px;">
                <!-- Google Script Will Populate this Div with Graph -->
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
                });

        var drawChart = function() {

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

            var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#loadable");

            $.get(uri)
                .done(function(data) {
                    var chart3DataTable = [['Country', 'Jan', 'May', 'Aug']];

                    data.forEach(function(item) {
                        chart3DataTable.push([item.countryName, parseInt(item.Jan), parseInt(item.May), parseInt(item.Aug)]);
                    });

                    chart3DataTable = google.visualization.arrayToDataTable(chart3DataTable);

                    var options = {
                        chart: {
                            title: 'Visits per Month'
                        },
                        hAxis: {
                            title: 'Total Visits',
                            minValue: 0
                        },
                        vAxis: {
                            title: 'Country'
                        },
                        bars: 'horizontal'
                    };

                    var chart = new google.visualization.BarChart(document.getElementById('chart3'));
                    chart.draw(chart3DataTable, options);
                })
                .fail(function () {
                    $('div').append($('span').text('Error loading data.').appendTo('#chart3'));
                })
                .always(function () {
                    $loading.remove();
                });
        };

        $('#theButton').on('click', drawChart);
        google.charts.setOnLoadCallback(drawChart);
    });
</script>