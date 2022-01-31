<?php

$file_pointer = fopen("testfile", "r");
$data = fread($file_pointer,200);
echo $data;
fclose($file_pointer);

?>