<?php


function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 65) && (strlen($userPwd) != 65)){

        return false;

    }

    $conn = mysqli_connect("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn == null){

        return false;

    }



    return true;

}

function GetFileStatus($userId){

    $conn = mysqli_connect("localhost", "root", "@nishpoudeL1", "DATABASE_USER");

    if($conn == null){

        return false;

    }

}

$UserID = $_GET["UserId"];
$UserPwd = $_GET["UserPwd"];

if(($UserId != "") && ($UserPwd != "")){

    if(VerifyUser($UserId, $UserPwd)){

        if(GetFileStatus($UserId)){



        }
        else{

            

        }

    }
    else{

        echo "File Error";

    }

}

?>