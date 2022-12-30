<?php

class ErrorController
{
    // gestion des erreurs 404
    public function error404() {
        $this->show('404');
    }

    // gestion des erreurs 401
    public function error401() {
        $this->show('401');
    }

    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . '/../view/header.tpl.php';
        require_once __DIR__ . '/../view/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../view/footer.tpl.php';
    }
}