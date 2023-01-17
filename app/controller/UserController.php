<?php

namespace EbookMomie\controller;
use EbookMomie\controller\CoreController;
use EbookMomie\model\User;

class UserController extends CoreController
{
    public function connection()
    {
        $viewData = [];

        $this->show('connection' , $viewData);
    }

    public function connectionPost()
    {

        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $user = User::checkByUsername($username);
        
        if ($user)
        {
            if ($password == $user->getMdp()){
                $_SESSION['id'] = $user->getId();
                $_SESSION['user'] = $user;

                header('Location: '.$_SERVER['BASE_URI']. '/');
            }
            else{
                header('Location: '.$_SERVER['BASE_URI']. '/connection');
            }
        }
        else{
            header('Location: '.$_SERVER['BASE_URI']. '/connection');
        }
    }
}