<?php

function VerifyHash($Input){

    if(strlen($Input) != 64){

        return false;

    }

    for($Index = 0;$Index<strlen($Input);$Index++){

        if(!($Input[$Index]<"0" && $Input[$Index] > "f")){

            if($Input[$Index] > "F" && $Input < "a"){
                
                return false;
            }
            
        }

    }

    return true;

}

define("UPLOAD_DIR", "./uploads/");

if (!empty($_FILES["myFile"])) {
    $myFile = $_FILES["myFile"];

    if ($myFile["error"] !== UPLOAD_ERR_OK) {
        echo "<p>An error occurred.</p>";
        exit;
    }

    // ensure a safe filename
    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

    // don't overwrite an existing file
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
        $i++;
        $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // preserve file from temporary directory
    $success = move_uploaded_file($myFile["tmp_name"],
        UPLOAD_DIR . $name);
    
    if (!$success) { 
        echo "<p>Unable to save file.</p>";
        exit;
    }
    else{

        $userId = $_GET["UserId"];

        if(!VerifyHash($userId)){

            die;

        }

        $file_hash = exec("ServerScript \""."D:/xampp/htdocs/autoprinter-server/htdocs/AutoPrinter/uploads/".$name . "\"" ." \"".$userId . "\"");
        //echo "<br>ServerScript \""."D:/xampp/htdocs/autoprinter-server/htdocs/AutoPrinter/uploads/".$name . "\"" ." \"".$userId . "\"";

        $conn = new mysqli("localhost", "root", "", "databest");

        if($conn->connect_error){

            echo "Error";
    
        }

        $encrypedHash = exec("ServerScript \""."D:/xampp/htdocs/autoprinter-server/htdocs/AutoPrinter/uploads/" . $name . "\"");

        $upload = "./uploads/";

        $conn->query("INSERT INTO FileTable (UserId, FileAddr, FileName, file_hash, encrypted_hash) VALUES ('" . $userId . "','" .  $upload . "','" . $name . "'," . "'".$file_hash."', ' " .$encrypedHash. "' );");

        $conn->close();

    }
}