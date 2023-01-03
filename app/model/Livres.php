<?php

class Livres
{

    private $id;
    private $auteurNom;
    private $auteurPrenom;
    private $Titre;
    private $AnneeAchat;
    private $id_user;

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of auteurNom
     */ 
    public function getAuteurNom()
    {
        return $this->auteurNom;
    }

    /**
     * Set the value of auteurNom
     *
     * @return  self
     */ 
    public function setAuteurNom($auteurNom)
    {
        $this->auteurNom = $auteurNom;

        return $this;
    }

    /**
     * Get the value of auteurPrenom
     */ 
    public function getAuteurPrenom()
    {
        return $this->auteurPrenom;
    }

    /**
     * Set the value of auteurPrenom
     *
     * @return  self
     */ 
    public function setAuteurPrenom($auteurPrenom)
    {
        $this->auteurPrenom = $auteurPrenom;

        return $this;
    }

    /**
     * Get the value of Titre
     */ 
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set the value of Titre
     *
     * @return  self
     */ 
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }

    /**
     * Get the value of anneeAchat
     */ 
    public function getAnneeAchat()
    {
        return $this->AnneeAchat;
    }

    /**
     * Set the value of anneeAchat
     *
     * @return  self
     */ 
    public function setAnneeAchat($AnneeAchat)
    {
        $this->AnneeAchat = $AnneeAchat;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function findAll(){

        $db = Database::getPDO();
        $sql = 'SELECT * FROM livres';

        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Livres');

        return $results;

    }

    public function modifDb(){
        global $router;
        
        $db = Database::getPDO();


        if (!empty($_POST)){
            $namefirst = $_POST['firstname'];
            $subname = $_POST['lastname'];
            $yourtitle = $_POST['title'];
            $yourid = $_POST['idlivre'];
    
            $namefirst = str_replace("'", "\'", $namefirst);
            $subname = str_replace("'", "\'", $subname);
            $yourtitle = str_replace("'", "\'", $yourtitle);

            $sql = "UPDATE livres SET auteurNom='$subname' , auteurPrenom='$namefirst' , Titre='$yourtitle' WHERE id='$yourid'";
            $db->query($sql);
        }

        header('Location:'. $router->generate('home'));
    }

    public function supprDb(){
        global $router;

        $db = Database::getPDO();
        $yourid = $_POST['idlivre'];
        $sql = "DELETE FROM livres WHERE id='$yourid'";

        $db ->exec($sql);
        header('Location:'. $router->generate('home'));
    }
}