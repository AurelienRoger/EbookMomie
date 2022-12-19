<?php

include 'db/db.php';


$sql = "SELECT * FROM livres";

$pdoStatement = $conn->query($sql) ;
$listLivre = $pdoStatement->fetchAll();

//Pour debug
//var_dump($listLivre);

include 'tpl/index.tpl.php';
?>