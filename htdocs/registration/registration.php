<?php 
    $username=$_POST['email'];
    $password=$_POST['psw'];
    $passwordRepeat=$_POST['psw-repeat'];
    $id=$_GET['user_id'];


    $conn = mysqli_connect("localhost","root","","autoprinter_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }
       echo "Connected successfully";
     
    $q = "INSERT INTO `user_info`( `user_name`, `pwd`) VALUES ('$username','$password')";
    $result=mysqli_query($conn,$q);

    /*$q1 = "SELECT * FROM user_info WHERE user_name LIKE '".$username."' AND pwd LIKE '".$password."'";
    $result1=mysqli_query($conn,$q1);
    if(mysqli_num_rows($result1)>0)
    {
      $cat =mysqli_fetch_assoc($result1);
      $id=$cat['id'];
    }*/


    include "phpqrcode/qrlib.php";
    $website="http://www.bloombyte.bike/";
    $PNG_TEMP_DIR = 'temp/';
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR . 'test.png';
    $codeString = $website;
    $codeString = $website ."?id=". $id;
    $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';
    QRcode::png($codeString, $filename);
    
    ?>

    <div align=center>
                <h1>Scan QR Code</h1>
            <?php

            echo '<img  width="400" height="400" src="' . $PNG_TEMP_DIR . basename($filename) . '"/>';

    ?>
            </div>
<?php
    header("Location: index.php?fname=$filename");
    exit();
?>