<?php

include 'db/db.php';


$sql = "SELECT * FROM livres";



//Pour debug
//var_dump($listLivre);

if (!empty($_GET['order'])){
    if ($_GET['order'] == 'nom'){
        $sql .= ' ORDER BY auteurNom';
    }
    elseif ($_GET['order'] == 'prenom'){
        $sql .= ' ORDER BY auteurPrenom';
    }
    elseif ($_GET['order'] == 'titre'){
        $sql .= ' ORDER BY Titre';
    }
    // TODO #1 Faire la recherche pour date aussi 
}

$pdoStatement = $conn->query($sql) ;
$listLivre = $pdoStatement->fetchAll();

// TODO #2 Gerer les boutons supprimer et modifier

include 'tpl/index.tpl.php';
?>