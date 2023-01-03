<?php

class MainController
{
    
    public function home() {
        
        $livresMod = new Livres();
        $affLivres = $livresMod->findAll();


        $this->show('index', ['listLivre' => $affLivres]);

    }

    public function modifDb(){
        $newModif = new Livres();
        $newModif->modifDb();
    }

    public function supprDb(){
        $newSuppr = new Livres();
        $newSuppr->supprDb();
    }

    public function show($viewName, $viewData = [])
    {

        global $router;

        require_once __DIR__ . '/../view/header.tpl.php';
        require_once __DIR__ . '/../view/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../view/footer.tpl.php';
    }

}

?>