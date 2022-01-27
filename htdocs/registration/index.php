<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Dashboard</title>
</head>
<body>

    Click here to <a href="register.php" tite="Register">Register.</a>

    <?php
    if (isset($_GET['fname'])) {
        $filename=$_GET['fname'];
        ?>
        <div align=center>
                <h1>Scan QR Code</h1>
            <?php

            echo '<img  width="400" height="400" src="' . $filename . '"/>';

    ?>
            </div>
            <?php
    }  

    ?>
    

    
</body>
</html>