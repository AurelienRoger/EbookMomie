<?php

namespace EbookMomie\model;

use EbookMomie\utils\Database;
use EbookMomie\model\User;
use EbookMomie\controller\UserController;
use EbookMomie\controller\CoreController;
use PDO;

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

    public static function find($id)
    {
        $db = Database::getPDO();
        $sql = "SELECT * FROM livres WHERE id = :id";

        $pdoStatement = $db->prepare($sql);
        $pdoStatement -> bindParam('id' , $id);
        $pdoStatement -> execute();

        $result = $pdoStatement->fetchObject('EbookMomie\model\Livres');

        return $result;

    }

    public static function findAll(){


        $db = Database::getPDO();

        $sql = 'SELECT * FROM livres ORDER BY auteurNom';
       // $sql = 'SELECT user.id FROM user INNER JOIN livres WHERE livres.id_user = 1';
       //$sql = 'SELECT * FROM livres INNER JOIN user WHERE user.id = livres.id_user';
        //$sql = 'SELECT * FROM livres INNER JOIN user WHERE livres.id_user = user.id';

        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'EbookMomie\model\Livres');

        return $results;

    }

    public function update()
    {
        $db = Database::getPDO();
        $sql = "UPDATE livres SET auteurNom = :auteurNom, auteurPrenom = :auteurPrenom, Titre = :Titre WHERE id = :id";
        $pdoStatement = $db->prepare($sql);

        $pdoStatement->bindParam('auteurNom' , $this->auteurNom);
        $pdoStatement->bindParam('auteurPrenom' , $this->auteurPrenom);
        $pdoStatement->bindParam('Titre' , $this->Titre);
        $pdoStatement->bindParam('id' , $this->id);

        $pdoStatement->execute();
    }

    public function add()
    {
        $db = Database::getPDO();
        $sql = "INSERT INTO livres (auteurNom , auteurPrenom , Titre) VALUES (:auteurNom, :auteurPrenom, :Titre)";
        $pdoStatement = $db->prepare($sql);

        $pdoStatement->bindParam('auteurNom' , $this->auteurNom);
        $pdoStatement->bindParam('auteurPrenom' , $this->auteurPrenom);
        $pdoStatement->bindParam('Titre' , $this->Titre);

        $success = $pdoStatement->execute();
    }

    public function delete()
    {
        $db = Database::getPDO();
        $sql = "DELETE FROM livres WHERE id=:id";
        $pdoStatement = $db->prepare($sql);

        $pdoStatement->bindParam('id' , $this->id);

        $success = $pdoStatement->execute();


    }

    public function showById(){

        $db = Database::getPDO();

        $sql = 'SELECT * FROM livres INNER JOIN user WHERE user.id = livres.id_user';

        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'EbookMomie\model\Livres');

        return $results;

    }

}