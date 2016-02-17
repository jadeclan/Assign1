<!-- begin Card3Dash2.tpl -->
<div class="card z-depth-1-half" id="card3">
    <div class="card-content hoverable">
        <span class="card-title">Country Statistics</span>
        <div class="input-field">
            <select id="cSelection" name="continent" class="initialized" style="display:block;">
                <option value="" disabled selected>Select a Continent</option>
            </select>
        </div>


        <table id="continentBox" class="hide">
            <thead>
            <tr id="selectedContinent">
                <th>Country</th>
                <th>Visits</th>
            </tr>
            </thead>
            <tbody id="contBody">
            </tbody>
        </table>
    </div>
</div>
<!-- end Card3Dash2.tpl -->
<script>
    $(function () {

        //var $loading = $('<div class="progress">').append($('<div class="indeterminate"></div></div>')).appendTo("#contBody");

        $.get('<?= $siteurl ?>?url=api/continents')
                .done(function(data) {
                    data.forEach(function(continent) {
                        $('<option>').val(continent.ContinentCode).text(continent.ContinentName).appendTo("#cSelection");
                    });
                });
        var updateCard3 = function (){
            $('#continentBox').attr("class", "");
            var uri = '<?= $siteurl ?>?url=api/card3Dash2';
            var countrySelection = $("#cSelection").val();
            if(countrySelection)
                uri += '&country=' + encodeURIComponent(countrySelection);

            $.get(uri)
                    .done(function(data){
                        data.forEach(function(item) {
                            var row = $('<tr>');
                            $('<td>').html(item.countryName).appendTo(row);
                            $('<td>').html(item.hits).appendTo(row);
                            row.appendTo('#contBody');
                        });
                    })
                    .fail(function () {

                    })
                    .always(function () {
                        //$loading.remove();
                    });
        };

        $('#cSelection').on('change', updateCard3);
        updateCard3();
    });
</script>