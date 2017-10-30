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
    <div>
    <?php if ($data['proyectos'] == 0): ?>
        <div>NO HAY PROYECTOS REVISADOS</div>
    <?php else: ?>
        <strong>Proyectos Revisados: </strong><span><?php echo count($data['proyectos']);?></span>
        <table>
          <thead>
            <th>TITULO</th>
            <th>OPERACION</th>
          </thead>
          <tbody>
            <?php foreach ($data['proyectos'] as $proyecto): ?>
              <tr>
                <td><?php echo $proyecto->f3; ?></td>
                <td><a href="<?php echo "/revisor/calificado/{$proyecto->f1}"; ?>">ACTUALIZAR</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php endif;?>
    </div>
  </body>
</html>
