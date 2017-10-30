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
    <header>PROYECTO CALIFICANDOSE: <strong><?php echo $data['data']->f2;?></strong></header>
    <!--
        //f1 proyecto_asignado_id
        //f2 titulo
        //f3 calificaciones
        //f4 valoraciones
        //f5 evaluaciones
    -->
    <section>
      <form method="POST" action="/revisor/calificar">
      <div><input type="hidden" name="asignado_id" value="<?php echo $data['data']->f1; ?>"></div>
        <div>
          <h6>Calificación</h6>
          <select required name="calificacion">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($data['data']->f3 as $cal):?>
                <option value="<?php echo $cal->calificacion_id; ?>">
                  <?php echo $cal->calificacion; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <h6>Valoracion</h6>
          <select required name="valoracion">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($data['data']->f4 as $val):?>
                <option value="<?php echo $val->valoracion_id; ?>">
                  <?php echo $val->valoracion; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <h6>Evaluacion</h6>
          <select required name="evaluacion">
            <option disabled selected value> -- select an option -- </option>
            <?php foreach ($data['data']->f5 as $evalu):?>
                <option value="<?php echo $evalu->id; ?>">
                  <?php echo $evalu->value; ?>
                </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <input type="submit" value="calificar">
        </div>
      </form>
    </section>
  </body>
</html>
