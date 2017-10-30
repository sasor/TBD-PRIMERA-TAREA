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
    <section><strong>DIRECTOR</strong></section>
    <h4>PROYECTOS ASIGNADOS A UN REVISOR</h4>
    <div>
      <!--
        // f1 -> proyecto_asignado_id
        // f2 -> proyecto_id
        // f3 -> titulo del proyecto
      -->
      <?php if ($data['data']==0): ?>
        <div><strong>NO HAY PROYECTOS ASIGNADOS YET</strong></div>
      <?php else: ?>
        <table border="1">
          <thead>
            <tr>
              <th>TITULO</th>
              <th>OPERACION</th>
            </tr>
          </thead>
          <tfoot></tfoot>
          <tbody>
            <?php foreach($data['data'] as $p): ?>
              <tr>
                <td><?php echo $p->f3;?></td>
                <td><a href="<?php echo "/director/asignado/{$p->f1}"; ?>">DETALLE</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </body>
</html>
