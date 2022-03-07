<?php 

$userId = strval($_GET["UserId"]);
$userPwd = strval($_GET["UserPwd"]);

function AddUsers($userId, $userPwd){

    $conn = new mysqli("localhost", "root", "", "DATABEST");

    if($conn->connect_error){

        return false;

    }

    $result = $conn->query("SELECT UserId FROM usertable where usertable.UserId = '" . $userId . "';");

    if($result->num_rows != 0){

        echo "UserName Already Exists";
        die;

    }

    $conn->query("INSERT INTO usertable(UserId, UserPwd, num_of_files, error_status, is_active) VALUES (" . "'" . $userId. "'," . "'". $userPwd . "'," . "0, 0, 0);");

    $conn->close();

}

AddUsers($userId, $userPwd);

echo "New User Created";

?>