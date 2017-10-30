<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav>
      <?php include(APP.DS.'app'.DS.'views'.DS.'layout'.DS.'header.php');?>
    </nav>
    <section><strong>ADMINISTRATOR</strong></section>
    <div>
      <ul>
        <?php foreach ($data['data'] as $item) :?>
        <!--
        <li><a href="/administrador/usuarios">listar usuarios</a></li>
        <li><a href="/administrador/eliminar_usuarios">eliminar usuarios</a></li>
        <li><a href="/administrador/crear_usuario">crear usuario</a></li>
        <li><a href="/administrador/roles">ROLES</a></li>
                // f1 funcion_id
                // f2 ui_id
                // f3 ui ruta
        -->
            <?php if ($item[1]): ?>
                <li><a href="<?php echo $item[3] ?>"><?php echo $item[2]; ?></a></li>
            <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </div>
  </body>
</html>
