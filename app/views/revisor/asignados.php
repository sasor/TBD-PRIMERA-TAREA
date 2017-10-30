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
    <section><strong>ROL-REVISOR</strong></section>
    <?php if ($data['proyectos'] == 0): ?>
        <div>NO HAY PROYECTOS ASIGNADOS</div>
    <?php else: ?>
        <strong>Proyectos Asignados: </strong><span><?php echo count($data['proyectos']);?></span>
        <table>
          <thead>
            <th>TITULO</th>
            <th>OPERACION</th>
          </thead>
          <tbody>
            <?php foreach ($data['proyectos'] as $proyecto): ?>
              <tr>
                <td><?php echo $proyecto->f3; ?></td>
                <td><a href="<?php echo "/revisor/proyecto/{$proyecto->f1}"; ?>">CALIFICAR</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php endif;?>
  </body>
</html>
