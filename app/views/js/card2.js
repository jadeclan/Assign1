$('#dSelection').on('change',function(){
    var selectedDevice = document.getElementById('dSelection').value;
    var deviceStats = document.getElementById('deviceBox');
    for (var i = 0; i < deviceList.length; i++) {
        if (deviceList[i].deviceBrand == selectedDevice) {
            deviceStats.innerHTML = selectedDevice + " was used to visit " + deviceList[i].hits + " times";
        }
    }
});