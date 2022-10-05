<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "keybord_typing";

    $conn = new mysqli($servername, $username, $password, $database);
    
    if($conn){
        echo 'connected';
    }
    else{
        echo 'connected failed';
    }
?>