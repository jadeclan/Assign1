function createBrowserBox(inArray) {
    var selectedBrowser = document.getElementById('bSelection').value;
    var browserStats = document.getElementById('browserBox');
    for (var i = 0; i < inArray.length; i++) {
        if (inArray[i].name == selectedBrowser) {
            browserStats.innerHTML = selectedBrowser + " had " + inArray[i].hits + " visits";
        }
    }
}