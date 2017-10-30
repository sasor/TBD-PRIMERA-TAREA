<?php
    var_dump($data['data']);
exit;
?>
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
    <h5>FUNCIONES</h5>
    <div>
        <form method="POST" action="/administrador/actualizar_rol">
            <div></div>
            <div>
                <?php foreach($data['data'] as $d): ?>
                    <?php if ($d->f2): ?>
                        <input checked type="checkbox" value="<?php echo $d->f1;?>" name="funciones[]">
                        <span><?php echo $d->f3;?></span>
                    <?php else: ?>
                        <input type="checkbox" value="<?php echo $d->f1;?>" name="funciones[]">
                        <span><?php echo $d->f3?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div>
                <input type="submit" value="actualizar">
            </div>
        </form>
    </div>
  </body>
</html>
