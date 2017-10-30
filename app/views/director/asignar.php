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
    <!--
        // f1 -> datos de proyecto TYPE object
        //     -> f1 proyecto_id
        //     -> f2 titulo proyecto
        //     -> f3 usuario_id
        //     -> f4 username
        //     -> f5 proyecto_status_id
        //     -> f6 status del proyecto
        //     -> f7 dependencia id
        //     -> f8 dependencia del proyecto
        // f2 -> todos los revisores ACTIVOS TYPE array ... un array de objectos
        //    -> f1  usuario_id
        //    -> f2  username
    -->
    <div>
      <div>
        <span>Titulo Proyecto:</span><span><strong><?php echo $data['data']->f1->f2; ?></strong></span><br>
        <span>Estatus Proyecto:</span><span><strong><?php  echo $data['data']->f1->f6; ?></strong></span><br>
        <span>Responsable Proyecto:</span><span><strong><?php echo $data['data']->f1->f4; ?></strong></span><br>
        <span>Dependencia Proyecto:</span><span><strong><?php echo $data['data']->f1->f8; ?></strong></span><br>
      </div>
      <div>
        <form method="POST" action="/director/asignando">
          <div>
            <input type="hidden" name="proyecto" value="<?php echo $data['data']->f1->f1; ?>">
          </div>
          <div>
            <h5>REVISORES ACTIVOS</h5>
            <?php if (count($data['data']->f2) != 0): ?>
              <select required name="revisor">
                <option disabled selected value> -- select an option -- </option>
              <?php foreach ($data['data']->f2 as $revisor):?>
                <option value="<?php echo $revisor->f1; ?>">
                  <?php echo $revisor->f2; ?>
                </option>
              <?php endforeach; ?>
              </select>
            <?php endif; ?>
          </div>
          <div>
            <input type="submit" value="ASIGNAR">
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
