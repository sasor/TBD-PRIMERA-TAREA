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
    <section><strong>ROL-ADMINISTRATOR</strong></section>
    <div>
      <?php ?>
      <?php if ($data['roles']==0): ?>
        <p>NO HAY ROLES DEFINIDOS</p>
      <?php else: ?>
        <ul>
          <?php foreach ($data['roles'] as $rol): ?>
          <li><a href="/administrador/rol/<?php echo $rol->rol_id; ?>"><?php echo $rol->rol; ?></a></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </body>
</html>
