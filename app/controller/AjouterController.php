<?php

class AjouterController
{
    public function ajouter() {
        $this->show('ajouter');
    }

    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . '/../view/header.tpl.php';
        require_once __DIR__ . '/../view/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../view/footer.tpl.php';
    }
}

?>