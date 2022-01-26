<?php 
    $username=$_POST['email'];
    $password=$_POST['psw'];
    $passwordRepeat=$_POST['psw-repeat'];

    $conn = mysqli_connect("localhost","root","","autoprinter_database");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
     }
       echo "Connected successfully";
     
    $q = "INSERT INTO `user_info`( `user_name`, `pwd`) VALUES ('$username','$password')";
    $result=mysqli_query($conn,$q);
    header("Location: index.php");
    exit();
?>