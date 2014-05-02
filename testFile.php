<?php

require 'DatabaseFunctions.php';

//getInterests("testUser");
$output = getInterests("unpaidUser");
for ($i = 0; $i < sizeof($output); $i++)
{
    echo $output[$i];
}

?>
