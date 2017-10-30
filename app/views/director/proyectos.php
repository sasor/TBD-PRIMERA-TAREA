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
    <section><strong>ROL-DIRECTOR</strong></section>
    <div>
      <?php ?>
      <?php if ($data['proyectos']==0): ?>
        <div><strong>NO HAY PROYECTOS YET</strong></div>
      <?php else: ?>
        <table border="1">
          <thead>
            <tr>
              <th>TITULO</th>
              <th>STATUS</th>
              <th>DETALLE</th>
            </tr>
          </thead>
          <tfoot></tfoot>
          <tbody>
            <?php foreach($data['proyectos'] as $p): ?>
              <tr>
                <td><?php echo $p->f3;?></td>
                <td><?php echo $p->f2;?></td>
                <td><a href="<?php echo "/director/proyecto/{$p->f1}"; ?>">VER</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </body>
</html>
