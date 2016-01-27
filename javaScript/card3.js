/**
 * Created by james on 26/01/16.
 */
function createContinentBox(inArray){
    var selectedContinent = document.getElementById('cSelection').value;
    var table = document.getElementById('continentBox');
    table.className = "";
    table.setAttribute('display','block');
    tableRef = document.getElementById('continentBox').getElementsByTagName('tbody')[0];
    for (var i = 0; i < inArray.length; i++) {
        if (inArray[i].continentName == selectedContinent) {
            console.log(inArray[i].countryName);
            var row = tableRef.insertRow(tableRef.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = inArray[i].countryName;
            cell2.innerHTML = inArray[i].hits;
        }
    }
}