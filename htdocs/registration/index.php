<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Dashboard</title>
</head>
<body>

<?php
include ('session.php'); 

if($_SESSION["id"]) {
    ?>
    Welcome <?php echo $_SESSION["id"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a>
    <?php
    }



            include "phpqrcode/qrlib.php";
            $website="http://www.bloombyte.bike/";
            $ipaddress= $_SERVER['REMOTE_ADDR'];


            $PNG_TEMP_DIR = 'temp/';
            if (!file_exists($PNG_TEMP_DIR))
                mkdir($PNG_TEMP_DIR);
            $filename = $PNG_TEMP_DIR . 'test.png';
            $codeString = $website;
            $codeString = $website ."?id=". $_SESSION["id"];
            $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';
            QRcode::png($codeString, $filename);
            ?>
            <div align=center>
                <h1>Scan QR Code</h1>
            <?php

            echo '<img  width="400" height="400" src="' . $PNG_TEMP_DIR . basename($filename) . '"/>';

    ?>
            </div>
    
</body>
</html>