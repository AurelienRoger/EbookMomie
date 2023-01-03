<?php

class AjouterController
{
    public function ajouter() {
        $this->show('ajouter');
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