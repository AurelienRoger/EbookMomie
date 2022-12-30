<?php

class MainController
{
    

    public function home() {
        $this->show('index');
    }

    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . '/../view/header.tpl.php';
        require_once __DIR__ . '/../view/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../view/footer.tpl.php';
    }
}

?>