<?php

function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 64) && (strlen($userPwd) != 64)){

        return false;

    }


    $conn = new mysqli("localhost", "root", "", "DATABEST");

    if($conn->connect_error){
        echo "File Error";
        return false;

    }

    $result = $conn->query("SELECT userid, userpwd FROM usertable;", MYSQLI_STORE_RESULT);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            if(($row["userid"] == $userId) && ($row["userpwd"] == $userPwd)){

                $conn->close();

                return true;

            }

        }

    }

    return false;

}

function GetFileName($userId){

    $conn = new mysqli("localhost", "root", "", "DATABEST");

    if($conn->connect_error){

        return false;

    }

    $result = $conn->query("SELECT userid, fileAddr, fileName FROM FileTable");

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            if($row["userid"] == $userId){


                $output = $row["fileName"];
                
                $conn->query("DELETE FROM FileTable WHERE UserId='" . $userId . "';");

                $conn->close();

                echo $output;

            }

        }

    }

}

$UserId = strval($_GET["UserId"]);
$UserPwd = strval($_GET["UserPwd"]);

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