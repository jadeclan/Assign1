<!-- Begin Chart One TPL -->

<div class="card z-depth-1-half" id="card1">
    <div class="card-content hoverable">

        <div class="row">
            <div class="col s12 m7">
                <span class="card-title">Site Visits By Day</span>
            </div>
            <div class="col s12 m5">
                <div id="chartInput" class="input-field">
                    <!--TODO add drop down for choosing a year -->
                    <select id="mSelect" name="chosenMonth" class="initialized"></select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="col s12">
                    <div id="noChart1Data"></div>
                    <div id="chart1" style="width: 100%; height: 300px;">
                        <!-- Google Script Will Populate this Div with Graph --></div>
                </div>
            </div>
        </div>


    </div>
</div>

<script>
    $(function() {
        // Month Names with number of days in the month
        var months = [["", "January", "February", "March", "April",
            "May", "June", "July", "August",
            "September", "October", "November", "December"],
            [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]];

        // Drop down for selection of a month
        for (var i = 1; i <= 12; i++) {
            var monthOption = $('<option></option>').attr("value", i).html(months[0][i]);
            $('#mSelect').append(monthOption);
        }
        $('#mSelect').material_select();

        var drawDailyVisits = function() {
            var chart1Year = '2016';
            var chart1Month = $("#mSelect").val();
            var chart1Title = months[0][chart1Month] + ', ' + chart1Year;

            //base url
            var uri = '<?= $siteurl ?>?url=api/chart1';

            if (chart1Year)
                uri += '&year=' + encodeURIComponent(chart1Year);
            if (chart1Month)
                uri += '&month=' + encodeURIComponent(chart1Month);

            var $loading = $('<div class="progress">').append($('<div class="indeterminate">')).appendTo("#chart1");

            // ajax
            $.get(uri)
                    .done(function (data) {
                        // data is an array of objects
                        if (data.length) {

                            $("#noChart1Data").text = "";

                            var dataArray = [[
                                {label: "Day", type: "number"},
                                {label: "Visits", type: "number"}]];
                            var options = {
                                title: chart1Title,
                                legend: {position: 'bottom' },
                                hAxis: {title: 'Day of Month' },
                                vAxis: {title: 'Number of Visits' }
                            };

                            data.forEach(function (item) {
                                dataArray.push([parseInt(item.day), parseInt(item.monthDailyVisits)]);
                            });

                            var chart1DataTable = google.visualization.arrayToDataTable(dataArray);
                            var googleChart1 = new google.visualization.AreaChart(document.getElementById('chart1'));
                            googleChart1.draw(chart1DataTable, options);
                        } else {
                            $('#chart1').firstChild.remove();
                            $('#noChart1Data').text('No data available for this month');

                        }
                    })

                    .fail(function () {
                        $('div').append($('span').text('Error loading data.').appendTo('#chart1'));
                    })

                    .always(function () {
                        $loading.remove();
                    });
        };

        google.charts.setOnLoadCallback(drawDailyVisits);
        $('#mSelect').on('change', drawDailyVisits);
        $(window).resize(drawDailyVisits);
    });
</script>