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
    <h3>Usuario ID <strong><?php echo $data['usr']->usuario->usuario_id; ?></strong></h3>
    <div>
        <form method="POST" action="/administrador/actualizar_usuario">
          <div>
          <input type="hidden" value="<?php echo $data['usr']->usuario->usuario_id;?>" name="usr">
          </div>
          <div>
            <h5>USERNAME</h5>
            <input type="text"
                   name="username"
                   value="<?php echo $data['usr']->usuario->username;?>"
                   required>
          </div>
          <div>
            <h5>PASSWORD</h5>
            <input type="text"
                   name="password"
                   value="<?php echo $data['usr']->usuario->password;?>"
                   required>
          </div>
          <div>
            <h5>ROL</h5>
            <div>
              <?php foreach ($data['roles'] as $rol): ?>
                <?php ?>
                <?php if (in_array($rol->rol_id, $data['usr']->roles)): ?>
                    <input type="checkbox"
                           value="<?php echo $rol->rol_id;?>"
                           name="roles[]"
                           checked> <span><?php echo $rol->rol; ?></span>
                <?php else: ?>
                    <input type="checkbox"
                           value="<?php echo $rol->rol_id;?>"
                           name="roles[]"> <span><?php echo $rol->rol; ?></span>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
          <div>
            <input type="submit" value="update">
          </div>
        </form>
    </div>
  </body>
</html>
