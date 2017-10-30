<?php

class Administrador extends Controller
{
    public function index()
    {
        //var_dump($_SESSION);exit;
        $rol_id = $_SESSION['usr']->rol[0];
        $uis = [];
        $data = [];
        $outs = [];
        $all = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT data_rol(?)');
            $stmt->execute([$rol_id]);
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($datas);
            //exit;
            if (count($datas) == 0) {
                $data = 0;
            } else {
                $stmt2 = $link->prepare('SELECT traer_ui(?)');
                // f1 funcion_id
                // f2 ui_id
                // f3 ui ruta
                foreach ($datas as $d) {
                    //var_dump($d);
                    $std = json_decode($d['data_rol']);
                    $stmt2->execute([$std->f1]);
                    $puis = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($puis as $ui) {
                        array_push($uis, json_decode($ui['traer_ui']));
                    }
                    array_push($data, $std);
                }
                //array_push($outs, ['funciones'=>$data]);
                //array_push($outs, ['uis'=>$uis]);
                //var_dump($data);
                //var_dump($uis);
                //var_dump($outs);
                $salida = [];
                foreach ($data as $funcion) {
                    $salida = [$funcion->f1, $funcion->f2, $funcion->f3];
                    foreach ($uis as $ui) {
                        if ($ui->f1 == $funcion->f1) {
                            array_push($salida, $ui->f3);
                        }
                    }
                    array_push($all, $salida);
                }
                //var_dump($all);
                //exit;
            }
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/administrador/');
            //die();
            var_dump($e);
        }
        //$this->view('administrador/index', ['funciones'=>$data, 'uis'=>$uis]);
        $this->view('administrador/index', ['data'=>$all]);
    }

    public function rol($rol_id)
    {
        $data = [];

        if (!isset($rol_id)) {
            header('Location: http://tbd.local/administrador/');
            die();
        }
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT data_rol(?)');
            $stmt->execute([$rol_id]);
            $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($datas) == 0) {
                $data = 0;
            } else {
                foreach ($datas as $d) {
                    $std = json_decode($d['data_rol']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/administrador/');
            //die();
            var_dump($e);
        }

        $this->view('administrador/rol',['data'=>$data]);
    }

    public function roles()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $roles = $link->query('SELECT traer_roles()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($roles) == 0) {
                $data = 0;
            } else {
                foreach ($roles as $rol) {
                    $std = json_decode($rol['traer_roles']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/');
            //die();
            var_dump($e);
        }
        $this->view('administrador/roles',['roles'=>$data]);
    }

    public function usuarios()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $users = $link->query('SELECT listar_usuarios()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($users) == 0) {
                $data = 0;
            } else {
                foreach ($users as $user) {
                    $std = json_decode($user['listar_usuarios']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
            //var_dump($e);
        }
        $this->view('administrador/usuarios', ['users'=>$data]);
    }

    public function usuario($usuario)
    {
        $userdb;
        $roles = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT ver_usuario(?)');
            $stmt->execute([$usuario]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $userdb = json_decode($user['ver_usuario']);
            $rols = $link->query('SELECT obtener_allroles()')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rols as $rol) {
                array_push($roles, json_decode($rol['obtener_allroles']));
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
            //var_dump($e);
        }
        $this->view('administrador/usuario', ['roles'=>$roles,'usr'=>$userdb]);
    }

    public function actualizar_usuario()
    {
        //var_dump($_POST);
        if(empty($_POST)) {
            header('Location: http://tbd.local/');
            die();
        }
        if (count($_POST['roles']) == 0) {
            header('Location: http://tbd.local/home/error/Invalid_ROL_es_vacio');
            die();
        }

        $str = implode(',', $_POST['roles']);
        $str = "{".$str."}";

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT actualizar_usuario(?,?,?,?)');
            $stmt->execute([$_POST['usr'], $_POST['username'], $_POST['password'], $str]);
            //header('Location: http://tbd.local/administrador/usuario/'.$_POST['usr']);
            header('Location: http://tbd.local/administrador/usuarios');
            die();
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
            //var_dump($e);
        }
    }

    public function crear_usuario()
    {
        $data = [];
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $roles = $link->query('SELECT preparar_usuario()')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($roles as $role) {
                array_push($data, json_decode($role['preparar_usuario']));
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error');
            die();
            //var_dump($e);
        }
        $this->view('administrador/crear_usuario', ['roles'=>$data]);
    }

    public function guardar_usuario()
    {
        if (empty($_POST)) {
            header('Location: http://tbd.local/');
            die();
        }

        if (!isset($_POST['rol'])) {
            header('Location: http://tbd.local/administrador');
            die();
        }

        $roles = [];
        foreach ($_POST['rol'] as $k => $v) {
            if (!is_array($v)) {
                header('Location: http://tbd.local/home/error/no_array');
                die();
            }
            // $k es el id del rol
            // $v tipo array si esta o no activado
            //array_push($roles, json_encode([$k=>$v['active']]));
            //array_push($roles, "{{$k}:'{$v['active']}'}");
            array_push($roles, [$k,$v['active']]);
        }
        // this convert is necesary for send array to POSTGRES FUNCTION
        //$rols = "{".implode(',', $roles)."}";

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT guardar_usuario(?,?)');
            $stmt->execute([$_POST['username'], $_POST['password']]);
            $usr_id = $stmt->fetch(PDO::FETCH_ASSOC);
            $usr_id = $usr_id['guardar_usuario'];

            $stmt2 = $link->prepare('INSERT INTO usuario_rol (usuario,rol,activo) VALUES (?,?,?)');
            // insert multi-rows
            foreach ($roles as $rol) {
                array_unshift($rol, $usr_id);
                $stmt2->execute($rol);
            }
            header('Location: http://tbd.local/administrador');
            die();
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/Error_Insert_User');
            die();
            //var_dump($e);
        }
    }

    public function eliminar_usuarios()
    {
        $data = [];

        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $users = $link->query('SELECT listar_usuarios()')->fetchAll(PDO::FETCH_ASSOC);
            if (count($users) == 0) {
                $data = 0;
            } else {
                foreach ($users as $user) {
                    $std = json_decode($user['listar_usuarios']);
                    array_push($data, $std);
                }
            }
        } catch (PDOException $e) {
            header('Location: http://tbd.local/home/error/');
            die();
        }
        $this->view('administrador/eliminar_usuarios', ['users'=>$data]);
    }

    public function eliminar($usuario)
    {
        try {
            $db = DB::getInstance();
            $link = $db->getLink();
            $stmt = $link->prepare('SELECT eliminar_usuario(?)');
            $stmt->execute([$usuario]);
            header('Location: http://tbd.local/administrador');
            die();
        } catch (PDOException $e) {
            //header('Location: http://tbd.local/home/error/Error_Eliminar_Usuario');
            //die();
            var_dump($e);
        }
    }
}
