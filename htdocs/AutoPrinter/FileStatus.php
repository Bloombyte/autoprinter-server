<?php

function VerifyHash($Input){

    for($Index = 0;$Index<strlen($Input);$Index++){

        if(!($Input[$Index]<"0" && $Input[$Index] > "f")){

            if($Input[$Index] > "F" && $Input < "a"){
                
                return false;
            }
            
        }

    }

    return true;

}

function VerifyUser($userId, $userPwd){

    if((strlen($userId) != 64) && (strlen($userPwd) != 64)){

        return false;

    }

    if(!(VerifyHash($userId) && VerifyHash($userPwd))){

        return true;

    }


    $conn = new mysqli("localhost", "root", "", "DATABEST");

    if($conn->connect_error){
        echo "File Error";
        return false;

    }

    $result = $conn->query("SELECT userid, userpwd FROM usertable WHERE usertable.userid = '".$userId."';", MYSQLI_STORE_RESULT);

    if($result->num_rows > 0){

        while($row = $result->fetch_assoc()){

            if(($row["userid"] == $userId) && ($row["userpwd"] == $userPwd)){

                //$conn->close();

                return true;

            }

        }

    }
    else{

        die;

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

                //$conn->close();

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