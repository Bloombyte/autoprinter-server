<?php

function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 65) && (strlen($userPwd) != 65)){

        return false;

    }

    $conn = new mysqli("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn->connect_error){

        return false;

    }

    $conn->query("SELECT ;");

    return true;

}

function GetFileName($userId){

    $conn = new mysqli("localhost", "root", "@nishpoudeL1", "FILE_SERVER");

    if($conn->connect_error){

        return false;

    }

    $conn->query("SELECT fileAddr FROM File_Table WHERE ");

}

$UserID = $_GET["UserId"];
$UserPwd = $_GET["UserPwd"];

if(($UserId != "") && ($UserPwd != "")){

    if(VerifyUser($UserId, $UserPwd)){

        if(GetFileName($UserId)){



        }
        else{

            

        }

    }
    else{

        echo "File Error";

    }

}

?>