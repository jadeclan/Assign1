<!-- Begin Chart Of Three TPL -->
<div class="card" id="chart3Div">

    <div class="card-content hoverable">
        <span class="card-title">Column Chart - Visits per Country</span>
        <!--Dropdown list for top 10 countries -->
        <div class="row">

            <div class="col s4">
                <select id="countries1" name="firstCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select First Country</option>
                </select>
            </div>
            <div class="col s4">
                <select id="countries2" name="SecondCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select Second Country</option>
                </select>
            </div>
            <div class="col s4">
                <select id="countries3" name="ThirdCountryPicked" style="display: inline-block">
                    <option value="" disabled selected>Select Third Country</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <p>button here</p>
            </div>
        </div>

         <div id="noChart3Data"></div>
         <div id="chart3" style="width: 900px; height: 500px;">
         <!-- Google Script Will Populate this Div with Graph -->
         </div>

    </div>

</div>
<!-- End of Chart of Chart3 -->
<script type="text/javascript">

    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        $(function() {
            var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#chart3");

            var $country1 = $('#countries1').val();
            var $country2 = $('#countries2').val();
            var $country3 = $('#countries3').val();

            var months = [['Janurary', 'May', 'September'],
                          [1,5,8]];

            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);


            $.get('<?= $siteurl ?>?url=api/countries/topten')
                    .done(function(data) {
                        data.forEach(function (country) {
                            $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries1');
                            $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries2');
                            $('<option>').val(country.ISO).text(country.CountryName).appendTo('#countries3');
                        });
                    });


            //button.onclick(click, updatechart3);


            var updateChart3 = function() {

                var countryArray= [
                    {label: "Country", type: "string"},
                    {label: "Visits", type: "number"},
                    {label: "Months", type: "number"}
                ];

                var uri = '<?= $siteurl ?>?url=api/chart3';
                if($country1)
                    uri += '&country1=' + encodeURIComponent($country1);
                if($country2)
                    uri += '&country2=' + encodeURIComponent($country2);
                if($country3)
                    uri += '&country3=' + encodeURIComponent($country3);

                $.get(uri)
                        .done(function (data) {
                            var chart3DataTable = google.visualization.arrayToDataTable(dataArray);
                            var chart = new google.charts.Bar(document.getElementById('chart3'));
                            googleChart1.draw(chart3DataTable, options);
                        })
                        .fail(function () {

                        })
                        .always(function () {
                            $loading.remove();
                        });

                //var chartYear = 2016;
                //var chartMonth = 1;

               // var uri = '<?= $siteurl ?>?url=api/chart3';
               // if(chartYear)
                //uri += '&year=' + encodeURIComponent(chartYear);
               // if(chartMonth)
               // uri += '&month=' + encodeURIComponent(chartMonth);

                //$.get(uri)
                //.done(function (data) {
                // data is an array of objects
                //if (data.length) {
                //$("#noChart3Data").text = "";

                //var countryArray= [[
                //{label: "Country", type: "string"},
                //{label: "Month", type: "string"},
                //{label: "Visits", type: "number"}]];

                //var options = {
               // title: 'Site Visits',
                //subtitle: '2016',
                //legend: {position: 'bottom' },
               // hAxis: {title: 'Year' },
               // };

                //data.forEach(function(item, index){
               // countryArray.push([item.countryName, item.visitsCount, item.visit_date]);
                //$('<option>').text(item.CountryName).appendTo($country1, $country2, $country3);
                //});


                //} else {
                //$('#chart3').firstChild.remove();
                //$('#noChart3Data').text('No data available for this month');

               // }
               // })
                //.fail(function () {
                //$('div').append($('span').text('Error loading data.').appendTo('#chart3'));
                //})
                //.always(function () {
                //$loading.remove();
                //});
                //};
            };
//            $country1.on('change', updateChart3);
//            $country2.on('change', updateChart3);
//            $country3.on('change', updateChart3);
            updateChart3();
        });
    };
</script>