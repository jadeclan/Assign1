<!-- Begin Chart Two TPL -->
<div class="card" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Visits per Country Map</span>
        <div class="row">
            <div class="col s12 m3">
                <div class="input-field">
                    <select id="months" name="monthPicked" class="initialized"></select>
                </div>
            </div>
            <div class="col s12">
                <div id="nodata"></div>
                <div id="chart2Div" style="width: 100%; height: 100%;"></div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(function(){
        var months = ['','January', 'February', 'March',
            'April', 'May', 'June',
            'July', 'August', 'September',
            'October', 'November', 'December'];

        //dropdown for selecting a month
        var selectElement = $('#months');
        for(var i = 1; i <= 12; i++){
            var countryOpt = $('<option></option>').attr("value", i).html(months[i]);
            $(selectElement).append(countryOpt);
        }
        $('#months').material_select();

        var drawRegionsMap = function() {
            var $loading = $('<div class="progress">').append($('<div class="indeterminate">')).appendTo("#chart2Div");

            var chartYear = '2016';
            var chartMonth = $("#months").val();

            //base uri
            var uri = '<?= $siteurl ?>?url=api/chart2';
            if(chartYear)
                uri += '&year=' + encodeURIComponent(chartYear);
            if(chartMonth)
                uri += '&month=' + encodeURIComponent(chartMonth);

            $.get(uri)
                .done(function (data) {
                    if(data.length){
                        if($("#nodata")){
                            $("h5").remove();
                        }
                        $('#chart2Div').css("height", 500);
                        var countryArray = [[{label: 'Country', type: 'string'},
                            {label: 'Visits', type: 'number'}]];

                        var options = {
                            colorAxis: {colors: ['#f48fb1', '#c51162', '#880e4f']},
                            defaultColor: '#cfd8dc',
                            datalessRegionColor: '#cfd8dc'
                        };

                        data.forEach(function(item){
                            countryArray.push([item.countryName, item.visitsCount]);
                        });

                        var countryData = google.visualization.arrayToDataTable(countryArray);

                        chart = new google.visualization.GeoChart(document.getElementById('chart2Div'));
                        chart.draw(countryData, options);
                    }else{
                        if($("#nodata")){
                            $("h5").remove();
                        }
                        $('<h5 class="center-align">').text('No visits for this month.').appendTo('#nodata');
                        chart.clearChart();
                        $('#chart2Div').css("height", 100);
                    }
                })
                .fail(function() {
                    $('div').append($('span').text('Error loading data.').appendTo('#chart2Div'));
                })

                .always(function() {
                    $loading.remove();
                });

        };

        google.charts.setOnLoadCallback(drawRegionsMap);
        $('#months').on('change', drawRegionsMap);
        $(window).resize(drawRegionsMap);
    });
</script>

<!-- End Chart Two TPL -->