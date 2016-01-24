<?php
/* function to display table rows of the number of hits by browser type
 *
 * $inArray an array of browerHits objects
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