$('#cSelection').on('change',function(){
    var inArray = continentData;
    var selectedContinent = document.getElementById('cSelection').value;
    var table = document.getElementById('continentBox');
    table.className = "";
    var rows = table.rows.length;
    for(var i=rows;i>1;i--){
        table.deleteRow(i-1);
    }
    table.setAttribute('display','block');
    tableRef = document.getElementById('continentBox').getElementsByTagName('tbody')[0];
    for (i = 0; i < inArray.length; i++) {
        if (inArray[i].continentName == selectedContinent) {
            var row = tableRef.insertRow(tableRef.rows.length);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = inArray[i].countryName;
            cell2.innerHTML = inArray[i].hits;
        }
    }
});