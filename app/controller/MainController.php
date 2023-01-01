<?php

class MainController
{
    
    public function home() {
        
        $listlivre = $this->showDataDb();
        $this->show('index', $listlivre);

    }

    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . '/../view/header.tpl.php';
        require_once __DIR__ . '/../view/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../view/footer.tpl.php';
    }

    public function showDataDb(){
        //instance de la classe Database, connexion maintenue avec le __construct
        $newConn = new Database();

        //stockage dans $listlivre les résultats obtenus avec showData ( affichage de données )
        // puis fetch all pour recup les resultats
        $listLivre = $newConn->showData()->fetchAll(PDO :: FETCH_ASSOC);
        return $listLivre;
    }

}

?>