<?php 

class Revisor extends Controller
{
    public function index()
    {
        $this->view('revisor/index');
    }

    public function asignados()
    {
        if (!isset($_SESSION['usr'])) {
            header('Location: http://tbd.local/home/error/NO_SIGNED');
            die();
        }

        $data = [];
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT revisor_proyecto(?)');
            $stmt->execute([$_SESSION['usr']->usuario]);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($proyectos);exit;
            if (count($proyectos) == 0) {
                $data = 0;
            } else {
                foreach ($proyectos as $proyecto) {
                    // f1 asignado_id
                    // f2 proyecto id
                    // f3 titulo_proyecto
                    $std = json_decode($proyecto['revisor_proyecto']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/ERROR_LISTAR_ASIGNADOS');
            die();
            //var_dump($e);
        }
        $this->view('revisor/asignados', ['proyectos'=>$data]);
    }

    public function revisados()
    {
        if (!isset($_SESSION['usr'])) {
            header('Location: http://tbd.local/home/error/NO_SIGNED');
            die();
        }

        $data = [];
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT revisados(?)');
            $stmt->execute([$_SESSION['usr']->usuario]);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($proyectos);exit;
            if (count($proyectos) == 0) {
                $data = 0;
            } else {
                foreach ($proyectos as $proyecto) {
                    // f1 asignado_id
                    // f2 proyecto id
                    // f3 titulo_proyecto
                    $std = json_decode($proyecto['revisados']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/ERROR_LISTAR_REVISADOS');
            die();
            //var_dump($e);
        }
        $this->view('revisor/revisados', ['proyectos'=>$data]);
    }

    public function proyecto($proyecto_evaluacion)
    {
        if (!isset($proyecto_evaluacion)) {
            header('Location: http://tbd.local/revisor/');
            die();
        }
        //f1 proyecto_asignado_id
        //f2 titulo
        //f3 calificaciones
        //f4 valoraciones
        //f5 evaluaciones

        $data = null;

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT preparar_calificacion(?)');
            $stmt->execute([$proyecto_evaluacion]);
            $cookie = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = json_decode($cookie['preparar_calificacion']);
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/ERROR_VER_PROYECTO_ASIGNADO');
            //die();
            var_dump($e);
        }

        $this->view('revisor/proyecto', ['data'=>$data]);
    }

    public function calificar()
    {
        if (empty($_POST)) {
            header('Location: http://tbd.local/revisor/');
            die();
        }

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT calificar_proyecto(?,?,?,?)');
            $stmt->execute([$_POST['asignado_id'], $_POST['calificacion'], $_POST['valoracion'],$_POST['evaluacion']]);
            header('Location: http://tbd.local/revisor');
            die();
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/ERROR_CALIFICAR');
            //die();
            var_dump($e);
        }
    }

    public function calificado($asignado)
    {
        if (!isset($asignado)) {
            header('Location: http://tbd.local/revisor/asignados');
            die();
        }

        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT traer_calificado(?)');
            $stmt->execute([$asignado]);
            $cookie = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = json_decode($cookie['traer_calificado']);
            //var_dump($data);
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/ERROR_TRAER_CALIFICADO');
            //die();
            var_dump($e);
        }

        $this->view('revisor/calificado', ['data'=>$data]);
    }

    public function actualizar()
    {
        if (empty($_POST)) {
            header('Location: http://tbd.local/revisor/');
            die();
        }
        //var_dump($_POST);
        //exit;

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT actualizar_calificado(?,?,?,?,?)');
            $stmt->execute([$_POST['detalle'],
                            $_POST['proyecto_asignado'],
                            $_POST['calificacion'],
                            $_POST['valoracion'],
                            $_POST['evaluacion']]);
            header('Location: http://tbd.local/revisor');
            die();
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/ERROR_ACTUALIZAR_CALIFICADO');
            //die();
            var_dump($e);
        }
    }
}
