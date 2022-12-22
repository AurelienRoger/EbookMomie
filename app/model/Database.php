<?php

class Database
{
    public $db;

    public function __construct()
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
        $sql = "SELECT * FROM livres";
        $pdoStatement = $this->db->query($sql) ;
        
        return $pdoStatement;
    }

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
    
        $this->conn ->exec($sqlModif);
        header('Location: index.php');
        }
    }
}

?>