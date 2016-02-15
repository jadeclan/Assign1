<!-- Begin Chart Two TPL -->
<div class="card" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Geo Chart</span>
        <div class="input-field">
            <select id="months" name="monthPicked" class="initialized" style="display: inline-block"></select>
        </div>
        <div id="chart2Div" style="width: 670px; height: 500px;">
        </div>
    </div>
</div>


<script type="text/javascript">
    google.charts.load('current', {'packages':['geochart']});
    google.charts.setOnLoadCallback(drawRegionsMap);
    function drawRegionsMap() {
        $(function(){
            //this is temp month array (needs to change in my opinion)
            var months = ['January', 'February', 'March',
                'April', 'May', 'June',
                'July', 'August', 'October',
                'November', 'December'];

            //dropdown for selecting a month
            var selectElement = $('#months');
            for(var i = 0; i < months.length; i++){
                var countryOpt = $('<option></option>').attr("value", i).html(months[i]);
                $(selectElement).append(countryOpt);
            }

            var chartYear = '2016';
            var chartMonth = 1;
            var updateChart2 = function(){
                //base uri
                var uri = '<?= $siteurl ?>?url=api/chart2';
                if(chartYear)
                    uri += '&year=' + encodeURIComponent(chartYear);
                if(chartMonth)
                    uri += '&month=' + encodeURIComponent(chartMonth);
                var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#chart2Div");
                
                $.get(uri)
                        .done(function (data) {
                            if(data.length){
                                var countryArray = [[{label: 'Country', type: 'string'},
                                    {label: 'Visits', type: 'number'}]];

                                var options = {
                                    colorAxis: {colors: ['#f48fb1', '#c51162', '#880e4f']},
                                    defaultColor: '#f5f5f5'
                                };

                                data.forEach(function(item, index){
                                    countryArray.push([item.countryName, item.visitsCount]);
                                });

                                var countryData = google.visualization.arrayToDataTable(countryArray);

                                var chart = new google.visualization.GeoChart(document.getElementById('chart2Div'));
                                chart.draw(countryData, options);
                            }
                        });

            };
            updateChart2();
        });
    }
</script>

<!-- End Chart Two TPL -->