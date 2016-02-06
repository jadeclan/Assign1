var $cSelection = $('#cSelection');

$cSelection.on('change',function() {
    var $continentBox = $('#continentBox');

    for (var i = $continentBox.length; i > 1; i--) {
        i.deleteRow(i - 1);
    }
    $continentBox.attr("class", "");

    for (i = 0; i < continentData.length; i++) {
        if (continentData[i].continentName == $cSelection.val() ){
            var row = $('<tr>');
            $('<td>').html(continentData[i].countryName).appendTo(row);
            $('<td>').html(continentData[i].hits).appendTo(row);
            row.appendTo( $('#contBody') );
        }
    }

});