<?php

class Database
{
    public $db;

    public function __construct()
    //TODO #21 A rendre réutilisable
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=momie", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully"; 
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            } 
    }



    public function showData(){
        //TODO #20 A rendre réutilisable
        //requete sql a effectuer
        $sql = "SELECT * FROM livres";
        // requete sql effectuée avec db = connection et stockage dans $pdostatement
        $pdoStatement = $this->db->query($sql) ;
        
        return $pdoStatement;
    }

    //TODO #1 A verifier si pas autre methode pour la location srrver base uri mais fonctionne
    public function modificationDb(){
        if (!empty($_POST)){
            $namefirst = $_POST['firstname'];
            $subname = $_POST['lastname'];
            $yourtitle = $_POST['title'];
            $yourid = $_POST['idlivre'];
    
            $namefirst = str_replace("'", "\'", $namefirst);
            $subname = str_replace("'", "\'", $subname);
            $yourtitle = str_replace("'", "\'", $yourtitle);
            
    
        $sqlModif = "UPDATE livres SET auteurNom='$subname' , auteurPrenom='$namefirst' , Titre='$yourtitle' WHERE id='$yourid'";
    
        $this->db ->exec($sqlModif);
        header('Location:'.$_SERVER["BASE_URI"]);
        }
    }
}

?>