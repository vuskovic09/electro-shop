<?php
    $catCheck = $_POST['categoryCheck'];
    if(empty($catCheck)) 
    {
        echo("You didn't select any buildings.");
    } 
    else 
    {
        $N = count($catCheck);

        echo("You selected $N door(s): ");
        for($i=0; $i < $N; $i++)
        {
        echo($catCheck[$i] . " ");
        }
    }
?>