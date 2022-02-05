<?php 

$userId = strval($_GET["UserId"]);
$userPwd = strval($_GET["UserPwd"]);

function AddUsers($userId, $userPwd){

    $conn = new mysqli("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn->connect_error){

        return false;

    }

    $date = $date = date('Y/m/d H:i:s');

    $conn->query("INSERT INTO TABLE_USERS(Username, UserPassword, CreatedDate, num_of_files, error_status, is_active) VALUES (" . "'" . $userId. "'," . "'". $userPwd . "','" . $date . "'," . "0, 0, 0);");

    $conn->close();

}

AddUsers($userId, $userPwd);

?>