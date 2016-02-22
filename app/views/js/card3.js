var $cSelection = $('#cSelection');

$cSelection.on('change',function() {
    var $tableBody = $('#contBody');
    $tableBody.empty();
    $('#continentBox').attr("class", "striped");

    for (i = 0; i < continentData.length; i++) {
        if (continentData[i].continentName == $cSelection.val() ){
            var row = $('<tr>');
            $('<td>').html(continentData[i].countryName).appendTo(row);
            $('<td>').html(continentData[i].hits).appendTo(row);
            row.appendTo( $tableBody );
        }
    }


});