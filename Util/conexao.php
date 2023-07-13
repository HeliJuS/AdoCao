<?php

    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "adocao";
    try{
        $conn = new PDO("mysql:host=$servername;port=3306; dbname=$dbname", $user, $pass);
        if($conn){
        }
        else "Falha na conexão!";
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

?>