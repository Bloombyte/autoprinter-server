<?php

function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 65) && (strlen($userPwd) != 65)){

        return false;

    }

    if(str_contains($userId," ") && str_contains($userId, " ")){

        return false;

    }

    $conn = new mysqli("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn->connect_error){

        return false;

    }



    return true;

}

function GetFileForUser($userId){

    $conn = new mysqli("localhost", "root", "@nishpoudeL1", "FILE_SERVER");

    if($conn->connect_error){

        return "File Error";

    }

    $result = $conn->query("SELECT fileAddr FROM FileTable where FileTable.userId =='".$userId."'");

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