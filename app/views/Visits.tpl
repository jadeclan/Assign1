<!-- begin Visits.tpl -->

<div>
    <div class="row hide-on-med-and-up">
        <div class="col s12">
            <h3 class="center-align">Visits</h3>
        </div>
    </div>
    <div class="row">
        <div class="input-field col m2">
            <input id="countryAutocomplete" placeholder="All Countries"/>
            <input type="hidden" id="countryFilter"/>
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
        <div class="col s12 m8 offset-m2" style="position: relative">
            <table id="visits">
                <thead>
                <tr>
                    <th>Visit Date</th>
                    <th>Visit Time</th>
                    <th>IP Address</th>
                    <th>Country</th>
                    <th>Details</th>
                </tr>
                </thead>
                <tbody>
                <!-- this is kind of hackish... but it works (helps position the loading animation correctly when the table is empty)... -->
                <tr><td>&nbsp;</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m8 offset-m2 center">
            <hr/>
            <ul class="pagination">
            </ul>
        </div>
    </div>
</div>

<div id="visit-details-modal" class="modal">
    <div class="modal-content">
        <h4>Visit Details</h4>
        <hr>
        <div class="row">
            <div class="col s6">
                <ul class="collection">
                    <li class="collection-item"><b>Date: </b><span id="visitDate"></span></li>
                    <li class="collection-item"><b>Time: </b><span id="visitTime"></span></li>
                </ul>
            </div>
            <div class="col s6">
                <ul class="collection">
                    <li class="collection-item"><b>IP Address: </b><span id="ipAddress"></span></li>
                    <li class="collection-item"><b>Country: </b><span id="country"></span></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <ul class="collection">
                    <li class="collection-item"><b>Device Type: </b><span id="deviceType"></span></li>
                    <li class="collection-item"><b>Device Brand: </b><span id="deviceBrand"></span></li>
                </ul>
            </div>
            <div class="col s6">
                <ul class="collection">
                    <li class="collection-item"><b>Browser: </b><span id="browser"></span></li>
                    <li class="collection-item"><b>Referrer: </b><span id="referrer"></span></li>
                    <li class="collection-item"><b>Operating System: </b><span id="os"></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>

<script>
    $(function() {
        var updatePagination = function(currentPage, totalPages) {
            var startPage = currentPage > 5 ? currentPage - 5 : 1;
            var endPage = (startPage + 9 > totalPages) ? totalPages : startPage + 9;

            // clear pages
            $('.pagination').empty();

            // add left chevron
            $('<li>').addClass(startPage == 1 ? 'disabled' : '').append($('<a>').attr('id', 'page-left').append($('<i>').addClass('material-icons').text('chevron_left'))).appendTo('.pagination');

            // add pages
            for (var i = startPage; i <= endPage; i++)
                $('<li>').addClass(currentPage == i ? 'active' : 'waves-effect').data('page', i).append($('<a>').text(i)).on('click', function() {
                    if ($(this).hasClass('active'))
                        return;

                    $('.pagination').find('.active').removeClass('active');
                    $(this).addClass('active');

                    updateVisits($(this).data('page'));
                }).appendTo('.pagination');

            // add right chevron
            $('<li>').addClass(endPage == totalPages ? 'disabled' : '').append($('<a>').append($('<i>').addClass('material-icons').text('chevron_right'))).appendTo('.pagination');
        };

        var updateVisits = function(page) {
            // base uri
            var uri = '<?= $siteurl ?>?url=api/visits';

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

            // add pagination filters
            if (page)
                uri += '&page=' + encodeURIComponent(page);


            // Loading... (animation, gray and disable)
            var $loading = $('<div>')
                    .addClass('progress')
                    .css('position', 'absolute')
                    .css('left', '45%')
                    .css('top', '50%')
                    .css('width', '10%')
                    .css('height', '10px')
                    .append($('<div>').addClass('indeterminate')).appendTo($('#visits').parent());

            $('#visits').find('button').prop('disabled', true);
            $('#visits').fadeTo(0, 0.2);
            $('#pagination').fadeTo(0, 0.2);
            $('#pagination').find('li').off();

            // ajax
            $.get(uri)

                    .done(function (data) {
                        // save for later...
                        var visits = data.visits;

                        // clear table
                        $("#visits").find('tbody').empty();

                        // add results
                        if (visits.length) {
                            visits.forEach(function(item, index) {
                                $('<tr>').append(
                                    $('<td>').text(item.visitDate),
                                    $('<td>').text(item.visitTime),
                                    $('<td>').text(item.ipAddress),
                                    $('<td>').text(item.countryName),
                                    $('<td>').append($('<button>').addClass('btn').data('index', index).append($('<i>').addClass('large material-icons').text('view_list'))
                                        .on('click', function() {
                                            // details event handler
                                            var visit = visits[$(this).data('index')];

                                            // update modal details
                                            $("#visitDate").text(visit.visitDate);
                                            $("#visitTime").text(visit.visitTime);
                                            $("#ipAddress").text(visit.ipAddress);
                                            $("#country").text(visit.countryName);
                                            $("#deviceType").text(visit.deviceType);
                                            $("#deviceBrand").text(visit.deviceBrand);
                                            $("#browser").text(visit.browserName);
                                            $("#referrer").text(visit.referrerName);
                                            $("#os").text(visit.operatingSystem);

                                            // show modal
                                            $('#visit-details-modal').openModal();
                                        }))).appendTo('#visits');
                            });

                        } else {
                            $('<tr>').append(
                                $('<td>').text('No results found...')
                            ).appendTo('#visits');
                        }
                    })

                    .fail(function() {
                        $('<tr>').append(
                            $('<td>').text('Error loading data.')
                        ).appendTo('#visits');
                    })

                    .always(function(data) {
                        // update pagination
                        updatePagination(data.page, data.pages);

                        // remove loading animation
                        $loading.remove();
                        $('#visits').fadeTo(0, 1);
                        $('#pagination').fadeTo(0, 1);
                    });
        };

        // populate country filter
        $.get('<?= $siteurl ?>?url=api/countries')

                .done(function(data) {
                    var array = [];

                    data.forEach(function(item) {
                        array.push({ value: item.ISO, label: item.CountryName });
                    });

                    $("#countryAutocomplete").autocomplete({
                        source: array,
                        autoFocus: true,
                        select: function(event, ui) {
                            event.preventDefault();

                            $(this).val(ui.item.label);
                            $("#countryFilter").val(ui.item.value);

                            updateVisits();
                        }
                    });

                    // the jQuery UI autocomplete plugin doesn't support clearing the field, so...
                    $("#countryAutocomplete").on('keyup', function (e) {
                        if ( /* e.keyCode == 13 && */ !$(this).val()) {
                            $("#countryFilter").val("");
                            updateVisits();
                        }
                    });

                });

        // populate device type filter
        $.get('<?= $siteurl ?>?url=api/deviceTypes')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#deviceTypeFilter");
                    });

                    $("#deviceTypeFilter").material_select();
                });

        // populate device brands filter
        $.get('<?= $siteurl ?>?url=api/deviceBrands')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#deviceBrandFilter");
                    });

                    $("#deviceBrandFilter").material_select();
                });

        // populate browser filter
        $.get('<?= $siteurl ?>?url=api/browsers')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#browserFilter");
                    });

                    $("#browserFilter").material_select();
                });

        // populate referrer filter
        $.get('<?= $siteurl ?>?url=api/referrers')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.id).text(item.name).appendTo("#referrerFilter");
                    });

                    $("#referrerFilter").material_select();
                });

        // populate os filter
        $.get('<?= $siteurl ?>?url=api/os')

                .done(function(data) {
                    data.forEach(function(item) {
                        $('<option>').val(item.ID).text(item.name).appendTo("#osFilter");
                    });

                    $("#osFilter").material_select();
                });

        // attach event handlers
        $('.filter').on('change', updateVisits);

        // do initial load
        updateVisits();
    });
</script>

<!-- end Visits.tpl -->