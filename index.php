<?php

include 'db/db.php';
include 'supprData.php';
include 'funcModif.php';


//Where id_user = current_user
$sql = "SELECT * FROM livres";



//Pour debug
//var_dump($listLivre);


// Tri par ordre croissant soit du nom soit prenom soit titre
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
};

//Suppression de livre

if (!empty($_GET['delete_id'])){
    supprData();
};



$pdoStatement = $conn->query($sql) ;
$listLivre = $pdoStatement->fetchAll();


include 'tpl/index.tpl.php';
?>