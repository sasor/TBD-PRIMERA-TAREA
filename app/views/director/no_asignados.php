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
    <h4>PROYECTOS SIN ASIGNAR REVISOR</h4>
    <div>
      <?php if ($data['data']==0): ?>
        <div><strong>NO HAY PROYECTOS YET</strong></div>
      <?php else: ?>
        <table border="1">
          <thead>
            <tr>
              <th>TITULO</th>
              <th>STATUS</th>
              <th>OPERACION</th>
            </tr>
          </thead>
          <tfoot></tfoot>
          <tbody>
            <?php foreach($data['data'] as $p): ?>
              <tr>
                <td><?php echo $p->f3;?></td>
                <td><?php echo $p->f2;?></td>
                <td><a href="<?php echo "/director/asignar/{$p->f1}"; ?>">ASIGNAR</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </body>
</html>
