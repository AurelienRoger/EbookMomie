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
        

    $sqlModif = "UPDATE livres SET auteurNom='$subname' , auteurPrenom='$namefirst' , Titre='$yourtitle' WHERE id='$yourid'";
//TODO #1 Gérer le fait d'avoir des apostrophes dans les chaines de caractere qui font une erreur dans la requete mysql
    $pdoModif = $conn ->exec($sqlModif);
    header('Location: index.php');
}
};

modifDonneeDb();
?>