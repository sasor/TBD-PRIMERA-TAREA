<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function in()
    {
        var_dump($_POST);
        if(empty($_POST)) {
            header('Location: http://tbd.local');
            die();
        }

        if (empty($_POST['username']) || empty($_POST['password'])) {
            header('Location: http://tbd.local');
            die();
        }

        echo "Inside";
    }
}
