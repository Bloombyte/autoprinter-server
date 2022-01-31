<?php

$userName = strval($_GET["UserId"]);
$userPwd = strval($_GET["UserPwd"]);

if($userName == "4FE46201C2E7B57F5913E820E1EAFA31B68A3F50DDAB70C5B3B95FA87E4B830C" && $userPwd="CADF9364EC37B7FF517544C1195B59665E93F614A70AA39CE9F06D91B7CF1199"){
$file_pointer = fopen($userName, "r");
$data = fread($file_pointer,200);
echo $data;
fclose($file_pointer);
}
else{

    echo "Error";

}
?>