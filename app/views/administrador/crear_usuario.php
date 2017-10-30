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
    <h4>CREAR USUARIOS</h4>
    <div>
      <form method="POST" action="/administrador/guardar_usuario">
        <div>
          <h6>USERNAME</h6>
          <input required type="text" name="username">
        </div>
        <div>
          <h6>PASSWORD</h6>
          <input required type="text" name="password">
        </div>
        <div>
          <h6>ROLES</h6>
          <div>
            <?php foreach ($data['roles'] as $key => $rol): ?>
              <div>
                <input type="checkbox"
                       name="rol[<?php echo $rol->rol_id;?>]"
                       value="<?php echo $rol->rol_id;?>">
                <span><?php echo $rol->rol;?></span>
                <div>
                  <input type="radio"
                         name="rol[<?php echo $rol->rol_id;?>][active]"
                         value="t">
                  <span>activo</span>
                  <input type="radio"
                         name="rol[<?php echo $rol->rol_id;?>][active]"
                         value="f">
                  <span>no-activo</span>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div>
          <input type="submit" value="CREAR">
        </div>
      </form>
    </div>
  </body>
</html>
