<?php

function modifDonneeDb(){
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
    
        if (!empty($_POST)){
        $namefirst = $_POST['firstname'];
        $subname = $_POST['lastname'];
        $yourtitle = $_POST['title'];
        $yourid = $_POST['idlivre'];

        $namefirst = str_replace("'", "\'", $namefirst);
        $subname = str_replace("'", "\'", $subname);
        $yourtitle = str_replace("'", "\'", $yourtitle);
        

    $sqlModif = "UPDATE livres SET auteurNom='$subname' , auteurPrenom='$namefirst' , Titre='$yourtitle' WHERE id='$yourid'";

    $pdoModif = $conn ->exec($sqlModif);
    header('Location: index.php');
}
};

modifDonneeDb();
?>