<?php

function supprData(){


$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=momie", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //echo "Connection failed: " . $e->getMessage();
    }

    $sqlSuppr = 'DELETE FROM livres WHERE id = '.$_GET['delete_id'];

    $pdoSuppr = $conn ->exec($sqlSuppr);
    header('Location: index.php');
    exit();

};

//DELETE FROM livres WHERE id = 1


?>