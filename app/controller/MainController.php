<?php

namespace EbookMomie\controller;

use EbookMomie\model\Livres;

class MainController extends CoreController
{
    
    public function home() {
        
        $livresMod = new Livres();
        $affLivres = $livresMod->findAll();


        $this->show('index', ['listLivre' => $affLivres]);

    }

    public function update()
    {
        $id = $_POST['id'];
        $auteurNom = $_POST['auteurNom'];
        $auteurPrenom = $_POST['auteurPrenom'];
        $titre = $_POST['Titre'];

        $updateBook = Livres::find($id);

        $updateBook->setAuteurNom($auteurNom);
        $updateBook->setAuteurPrenom($auteurPrenom);
        $updateBook->setTitre($titre);
        
        $succes = $updateBook->update();

        $viewData['listLivre'] = Livres::findAll();

        $this->show('index', $viewData);
        //header('Location: index');



    }

    public function supprDb(){
        $newSuppr = new Livres();
        $newSuppr->supprDb();
    }



}

?>