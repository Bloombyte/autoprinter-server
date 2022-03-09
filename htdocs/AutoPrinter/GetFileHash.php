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

function GetFileHash($userId, $DecryptedFileHash){

    $conn = new mysqli("localhost", "root", "", "DATABEST");

    if($conn->connect_error){

        return "DataBase Error";

    }

    $result = $conn->query("SELECT USERID FROM filetable where filetable.userid = '".$userId."' and filetable.filehash = '" . $DecryptedFileHash ."';",MYSQLI_STORE_RESULT);

    if($result->num_rows == 0){

        return "Decryption Error";

    }else{

        return "Transfer Process Successful";

    }

}

$userId = strval($_GET["UserId"]);

$DecryptedFileHash = strval($_GET["FileHash"]);

if(strlen($userId) != 64 && strlen($DecryptedFileHash) != 64){

    echo "Encrypted File Hash Error";
    die;

}

if(VerifyHash($userId)){

    echo GetFileHash($userId, $DecryptedFileHash);

}
?>