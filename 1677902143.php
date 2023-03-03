<?php

//Basic for loop
for ($i = 0; $i < 10; $i++) {
    echo $i;
}

//For loop with array
$array = array("a", "b", "c");
for ($i = 0; $i < count($array); $i++) {
    echo $array[$i];
}

//For loop with associative array
$array = array("a" => 1, "b" => 2, "c" => 3);
foreach ($array as $key => $value) {
    echo $key . " = " . $value;
}

//For loop with range
for ($i = 10; $i <= 20; $i++) {
    echo $i;
}

?>