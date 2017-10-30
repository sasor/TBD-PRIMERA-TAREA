<?php

class Academico extends Controller
{
    public function index()
    {
        $user = $_SESSION['usr']->usuario;
        $proyectos = null;
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT listar_proyectos(?)');
            $stmt->execute([$user]);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($proyectos);exit;
            if (count($proyectos) == 0) {
                $data = 0;
            } else {
                foreach ($proyectos as $proyecto) {
                    $std = json_decode($proyecto['listar_proyectos']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
            //var_dump($e);
        }
        $this->view('academico/index', ['proyectos'=>$data]);
    }

    public function nuevo_proyecto()
    {
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $data = $link->query('SELECT preparar_proyecto()')->fetch(PDO::FETCH_ASSOC);
            $std = json_decode($data['preparar_proyecto']);
            //var_dump($data);
            //var_dump($std);
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
            var_dump($e);
        }
        $this->view('academico/nuevo_proyecto', ['data'=>$std]);
    }

    public function crear_proyecto()
    {
        if (empty($_POST)) {
            header('Location: http://tbd.local/home/error/');
            die();
        }

        $user = $_SESSION['usr']->usuario;
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT guardar_proyecto(?,?,?,?,?,?)');
            $stmt->execute([$user, $_POST['titulo'], $_POST['resumen'], $_POST['tipo'], $_POST['area'], $_POST['dependencia']]);
            header('Location: http://tbd.local/academico');
            die();
        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}
