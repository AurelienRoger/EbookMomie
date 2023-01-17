<?php

namespace EbookMomie\model;

use EbookMomie\controller\UserController;
use EbookMomie\utils\Database;
use PDO;

class User
{
    private $id;
    private $username;
    private $mdp;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of mdp
     */ 
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */ 
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    public static function find($id)
    {
        $db = Database::getPDO();
        $sql = "SELECT * FROM user WHERE id = :id";

        $pdoStatement = $db->prepare($sql);
        $pdoStatement -> bindParam('id' , $id);
        $pdoStatement -> execute();

        $result = $pdoStatement->fetchObject('EbookMomie\model\User');

        return $result;

    }

    public static function findAll(){

        $db = Database::getPDO();

        $sql = 'SELECT * FROM user';

        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'EbookMomie\model\User');

        return $results;

    }

    public function update()
    {

    }

    public function add()
    {

    }

    public function delete()
    {

    }

    public static function checkByUsername($username)
    {
        $db = Database::getPDO();
        $sql = "SELECT * FROM user WHERE username = :username";

        $pdoStatement = $db->prepare($sql);
        $pdoStatement -> bindParam('username' , $username);
        $pdoStatement -> execute();

        $result = $pdoStatement->fetchObject('EbookMomie\model\User');

        return $result;
    }

}