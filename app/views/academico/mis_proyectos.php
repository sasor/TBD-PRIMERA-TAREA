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

    <?php if ($data['proyectos'] == 0): ?>
        <div>NO HAY PROYECTOS</div>
        <div><a href="/academico/nuevo_proyecto">REGISTRAR NUEVO</a></div>
    <?php else: ?>
        <strong>Proyectos Registrados: </strong><span><?php echo count($data['proyectos']);?></span>
        <table border="1">
          <thead>
            <th>ID</th>
            <th>TITULO</th>
            <th>ESTATUS</th>
            <th>OPERACION</th>
          </thead>
          <tbody>
            <?php foreach ($data['proyectos'] as $proyecto): ?>
              <tr>
                <td><?php echo $proyecto->id; ?></td>
                <td><?php echo $proyecto->titulo; ?></td>
                <td><?php echo $proyecto->status; ?></td>
                <td><a href="<?php echo "/academico/proyecto/{$proyecto->id}"; ?>">DETALLE</a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php endif;?>
  </body>
</html>
