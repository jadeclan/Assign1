<!-- begin Card2.tpl -->
<div class="row">
    <div class="col12 m6">
        <div class="card z-depth-1-half" id="card2">
            <div class="card-content hoverable">
                <span class="card-title">Device Brands</span>

                <select id="dSelection" name="deviceName">
                    <option value="" disabled selected>Select a Device</option>

                </select>
                <div class="card-action center">
                    <span id="deviceBox"></span>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var card2D2Data;
    var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#deviceBox");

    (function () {
        //base url
        var uri = '<?= $siteurl ?>?url=api/card2Dash2';
        // ajax
        $.get(uri)
                .done(function (data) {
                    // Note this returns an array of objects that contains
                    // the brand names and the hits, since the data pull is
                    // small, we only need one data pull.
                    card2D2Data =  data;

                    // Drop down for selection of a month
                    for (var i=0; i<card2D2Data.length; i++) {
                        var brandOption = $('<option></option>').attr("value", card2D2Data[i].deviceBrand).html(card2D2Data[i].deviceBrand);
                        $('#dSelection').append(brandOption);
                    }
                    $('#dSelection').material_select();
                })
                .fail(function () {
                    $('div').append($('span').text('Error loading data.').appendTo('#deviceBox'));
                })
                .always(function () {
                    $loading.remove();
                });
    })();


    // Now set the listeners to display data on change
    $('#dSelection').on('change', function () {
        var selectedDevice = document.getElementById('dSelection').value;
        var deviceStats = document.getElementById('deviceBox');
        for (var i = 0; i < card2D2Data.length; i++) {
            if (card2D2Data[i].deviceBrand == selectedDevice) {
                deviceStats.innerHTML = selectedDevice + " was used to visit " + card2D2Data[i].hits + " times";
            }
        }
    });
});
</script>
<!-- end Card2.tpl -->