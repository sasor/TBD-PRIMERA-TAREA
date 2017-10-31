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
      <?php if (count($data['data']) == 0 || $data['data'] == 0): ?>
        <h3>NO TIENES FUNCIONES .. NO PUEDES HACER NADA</h3>
      <?php else: ?>
      <ul>
        <?php foreach($data['data'] as $funcion): ?>
          <li><a href="<?php echo $funcion->f2; ?>"><?php echo $funcion->f1; ?></a></li>
        <?php endforeach; ?>
      </ul>
      <?php endif; ?>
    </div>
  </body>
</html>
