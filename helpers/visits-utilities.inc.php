<?php
/* function to display table rows of the number of hits by browser type
 *
 * $inArray an array of browserHits objects
 */
function createTableRows($inArray){
    foreach ($inArray as $row){
        echo "<tr>" . PHP_EOL;
        echo "<td>" . $row->id . "</td>" . PHP_EOL;
        echo "<td>" . $row->name . "</td>" . PHP_EOL;
        echo "<td>" . $row->hits . "</td>" . PHP_EOL;
        echo "<td>" . $row->percentage . "</td>" . PHP_EOL;
        echo "</tr>" . PHP_EOL;
    }
}
/* function to display a list of options
 *
 * $inArray an array containing browser names
 */
function createBrowserOptionList($inArray){
    echo '<option>Select a Browser</option>' . PHP_EOL;
    foreach($inArray as $row){
        echo '<option value="' . $row->name. '">' . $row->name . '</option>' . PHP_EOL;
    }
}

/* function to display a list of options
 *
 * $inArray an array containing continent names
 */
function createContinentOptionList($inArray){
    $continentList = Array();
    echo '<option>Select a Continent</option>' . PHP_EOL;
    foreach($inArray as $row){
        if(!in_array($row->continentName, $continentList)){
            $continentList[] = $row->continentName;
            echo '<option value="' . $row->continentName. '">' . $row->continentName . '</option>' . PHP_EOL;
        }
    }
}