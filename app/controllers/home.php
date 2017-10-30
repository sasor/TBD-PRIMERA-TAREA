<?php

class Home extends Controller
{
    public function index($name = '')
    {
        //$user = $this->model('User');
        //$user->name = $name;
        //$this->view('home/index', ['name' => $user->name]);
        if (!isset($_SESSION['usr'])) {
            $url = 'http://tbd.local/login';
            header('Location: '.$url);
            die();
            //echo 'no definido session';
            //var_dump($_SESSION);
        }
        $this->view('home/index', ['home'=>true]);
    }

    public function error($message = '')
    {
        $this->view('home/error', ['message'=>$message]);
    }
}
