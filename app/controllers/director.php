<?php 

class Director extends Controller
{
    public function index()
    {
        $this->view('director/index');
    }

    public function asignando()
    {
        if (empty($_POST) || !isset($_POST)) {
            header('Location: http://tbd.local/home/error/NO_POST_EN_ASIGNAR');
            die();
        }

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT guardar_asignacion(?,?)');
            $stmt->execute([$_POST['proyecto'], $_POST['revisor']]);
            header('Location: http://tbd.local/director');
            die();
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/NO_SAVE_ASIGNAR');
            die();
            //var_dump($e);
        }
    }

    public function asignar($proyecto_id)
    {
        $data = null;

        if (!isset($proyecto_id)) {
            header('Location: http://tbd.local/home/error/NO_PROYECTO_ID');
            die();
        }

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT preparar_asignacion(?)');
            $stmt->execute([$proyecto_id]);
            $pre_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $data = json_decode($pre_data['preparar_asignacion']);
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/ASIGNAR_REVISOR');
            //die();
            var_dump($e);
        }

        $this->view('director/asignar', ['data'=>$data]);
    }

    public function listar_proyectos()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $pproyectos = $link->query('SELECT listar_proyectos_director()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($pproyectos) == 0) {
                $data = 0;
            } else {
                foreach ($pproyectos as $p) {
                    $std = json_decode($p['listar_proyectos_director']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        $this->view('director/proyectos', ['proyectos'=>$data]);
    }

    public function asignaciones()
    {
        $this->view('director/asignacion');
    }

    public function proyectos_asignados()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $proyectos = $link->query('SELECT proyectos_asignados_a_revisor()');
            if (count($proyectos) == 0) {
                $data = 0;
            } else {
                foreach ($proyectos as $p) {
                    $std = json_decode($p['proyectos_asignados_a_revisor']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/');
            //die();
            var_dump($e);
        }

        $this->view('director/asignados', ['data'=>$data]);
    }

    public function proyectos_no_asignados()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $proyectos = $link->query('SELECT proyectos_por_asignar()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($proyectos) == 0) {
                $data = 0;
            } else {
                foreach ($proyectos as $p) {
                    $std = json_decode($p['proyectos_por_asignar']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/');
            //die();
            var_dump($e);
        }

        $this->view('director/no_asignados', ['data'=>$data]);
    }
}
