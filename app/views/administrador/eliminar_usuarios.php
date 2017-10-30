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
    <div>
      <table>
        <thead>
          <th>USERNAME</th>
          <th>PASSWORD</th>
          <th>DETALLE</th>
        </thead>
        <tfoot></tfoot>
        <tbody>
          <?php ?>
          <?php foreach ($data['users'] as $user): ?>
            <tr>
              <td><?php echo $user->username;?></td>
              <td><?php echo $user->password;?></td>
              <td><a href="<?php echo "/administrador/eliminar/{$user->usuario_id}"; ?>">eliminar</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
