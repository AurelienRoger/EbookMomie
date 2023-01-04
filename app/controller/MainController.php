<?php

class MainController extends CoreController
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



}

?>