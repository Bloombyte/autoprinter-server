<?php

function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 65) && (strlen($userPwd) != 65)){

        return false;

    }

    $conn = mysqli_connect("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn == null){

        return false;

    }

    mysqli_close($conn);

    return true;

}

function GetFileForUser($userId){

    $conn = mysqli_connect("localhost", "root", "@nishpoudeL1", "FILE_SERVER");

    if($conn == null){

        return "File Error";

    }

    mysqli_close($conn);

}

$UserID = $_GET["UserId"];
$UserPwd = $_GET["UserPwd"];

if(($UserId != "") && ($UserPwd != "")){

    if(VerifyUser($UserId, $UserPwd)){

        echo GetFileForUser($UserId);

    }
    else{

        echo "File Error";

    }

}

?>