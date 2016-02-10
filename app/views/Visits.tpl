<!-- begin Visits.tpl -->

<div class="container">
    <div class="row">
        <div class="input-field col m2">
            <select id="countryFilter" class="filter">
                <option value="" selected>All Countries</option>
            </select>
        </div>
        <div class="input-field col m2">
            <select id="deviceTypeFilter" class="filter">
                <option value="" selected>All Device Types</option>
            </select>
        </div>
        <div class="input-field col m2">
            <select id="deviceBrandFilter" class="filter">
                <option value="" selected>All Device Brands</option>
            </select>
        </div>
        <div class="input-field col m2">
            <select id="browserFilter" class="filter">
                <option value="" selected>All Browsers</option>
            </select>
        </div>
        <div class="input-field col m2">
            <select id="referrerFilter" class="filter">
                <option value="" selected>All Referrers</option>
            </select>
        </div>
        <div class="input-field col m2">
            <select id="osFilter" class="filter">
                <option value="" selected>All Operating Systems</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col m6 offset-m3">
            <table id="visits">
                <thead>
                <tr>
                    <th>Visit Date</th>
                    <th>Visit Time</th>
                    <th>IP Address</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(function() {
        var visits = [];

        var updateVisits = function() {
            // base uri
            var uri = '<?= $siteurl ?>/?url=api/visits';

            // build filters
            var countryCode = $("#countryFilter").val();
            var deviceType = $("#deviceTypeFilter").val();
            var deviceBrand = $("#deviceBrandFilter").val();
            var browser = $("#browserFilter").val();
            var referrer = $("#referrerFilter").val();
            var os = $("#osFilter").val();

            if (countryCode)
                uri += '&country=' + encodeURIComponent(countryCode);

            if (deviceType)
                uri += '&deviceType=' + encodeURIComponent(deviceType);

            if (deviceBrand)
                uri += '&deviceBrand=' + encodeURIComponent(deviceBrand);

            if (browser)
                uri += '&browser=' + encodeURIComponent(browser);

            if (referrer)
                uri += '&referrer=' + encodeURIComponent(referrer);

            if (os)
                uri += '&os=' + encodeURIComponent(os);

            // ajax
            $.get(uri)

                    .done(function (data) {
                        visits = data;

                        // Apparently, the $("#visits tbody") syntax is horribly inefficient...
                        // see: http://stackoverflow.com/questions/12674591/inefficient-jquery-usage-warnings-in-phpstorm-ide

                        // clear table
                        $("#visits").find('tbody').empty();

                        // add results
                        if (visits.length) {
                            visits.forEach(function (item) {
                                $('<tr>').append(
                                        $('<td>').text(item.visitDate),
                                        $('<td>').text(item.visitTime),
                                        $('<td>').text(item.ipAddress),
                                        $('<td>').text(item.countryName)
                                ).attr('data-id', item.id).appendTo('#visits');
                            });
                        }
                    })

                    .fail(function () {

                    })

                    .always(function () {

                    });
        };

        // populate country filter
        $.get('<?= $siteurl ?>/?url=api/countries')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ISO).text(item.CountryName).appendTo("#countryFilter");
                    });

                    $("#countryFilter").material_select();
                });

        // populate device type filter
        $.get('<?= $siteurl ?>/?url=api/deviceTypes')

                .done(function(data) {
                    data.forEach(function (item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#deviceTypeFilter");
                    });

                    $("#deviceTypeFilter").material_select();
                });

        // populate device brands filter
        $.get('<?= $siteurl ?>/?url=api/deviceBrands')
                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#deviceBrandFilter");
                    });

                    $("#deviceBrandFilter").material_select();
                });

        // populate browser filter
        $.get('<?= $siteurl ?>/?url=api/browsers')
                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#browserFilter");
                    });

                    $("#browserFilter").material_select();
                });

        // populate referrer filter
        $.get('<?= $siteurl ?>/?url=api/referrers')
                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.id).text(item.name).appendTo("#referrerFilter");
                    });

                    $("#referrerFilter").material_select();
                });

        // populate os filter
        $.get('<?= $siteurl ?>/?url=api/os')
                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#osFilter");
                    });

                    $("#osFilter").material_select();
                });

        // attach event handlers
        $('select').on('change', updateVisits);

        // do initial load
        updateVisits();
    });
</script>

<!-- end Visits.tpl -->