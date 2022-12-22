<?php

require_once __DIR__ . '/../app/funcModif.php';
require_once __DIR__ . '/../app/supprData.php';





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

//Recherche dans la table
if(!empty($_GET['q'])){
    $rech = $_GET['q'];
    $sql.=" WHERE auteurNom LIKE '%$rech%' OR auteurPrenom LIKE '%$rech%' OR Titre LIKE '%$rech%'";
}


$newConn = new Database();
$listLivre = $newConn->showData()->fetchAll(PDO :: FETCH_ASSOC);

require_once __DIR__ . '/../app/view/header.tpl.php';
require_once __DIR__ . '/../app/view/index.tpl.php';
require_once __DIR__ . '/../app/view/footer.tpl.php';
?>