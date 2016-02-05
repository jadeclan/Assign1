<?php

namespace Application;

use Framework\Model;
use Framework\View;
use FRamework\Controller;

class Card2 extends Controller
{
    public function __construct()
    {
        parent::__construct('Card2');
    }

    public function Content()
    {
        return new View('Card2.tpl');
    }
}
/*
/* function to display a list of options
 *
 * $inArray an array containing browser names

function createBrowserOptionList($inArray){
    echo '<option>Select a Browser</option>' . PHP_EOL;
    foreach($inArray as $row){
        echo '<option value="' . $row->name. '">' . $row->name . '</option>' . PHP_EOL;
    }
 */