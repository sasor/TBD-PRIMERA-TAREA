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
    <header>PROYECTO : <strong><?php echo $data['data']->f2;?></strong></header>
    <!--
        // f1 objeto detalle
        // f2 titulo
        // f3 calificaciones
        // f4 valoraciones
        // f5 evaluaciones
    -->
      <form method="POST" action="/revisor/actualizar">
        <div>
          <input type="hidden" name="detalle" value="<?php echo $data['data']->f1->detalle_evaluacion_id; ?>">
          <input type="hidden" name="proyecto_asignado" value="<?php echo $data['data']->f1->proyecto_asignado_id; ?>">
        </div>
        <div>
          <h6>Calificación</h6>
          <select required name="calificacion">
            <option disabled value> -- select an option -- </option>
            <?php foreach ($data['data']->f3 as $cal):?>
              <?php if ($cal->calificacion_id == $data['data']->f1->calificacion): ?>
                    <option selected value="<?php echo $cal->calificacion_id; ?>">
                      <?php echo $cal->calificacion; ?>
                    </option>
              <?php else: ?>
                    <option value="<?php echo $cal->calificacion_id; ?>">
                      <?php echo $cal->calificacion; ?>
                    </option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <h6>Valoracion</h6>
          <select required name="valoracion">
            <option disabled value> -- select an option -- </option>
            <?php foreach ($data['data']->f4 as $val):?>
              <?php if ($val->valoracion_id == $data['data']->f1->valoracion_evaluacion): ?>
                    <option selected value="<?php echo $val->valoracion_id; ?>">
                      <?php echo $val->valoracion; ?>
                    </option>
              <?php else: ?>
                    <option value="<?php echo $val->valoracion_id; ?>">
                      <?php echo $val->valoracion; ?>
                    </option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <h6>Evaluacion</h6>
          <select required name="evaluacion">
            <option disabled value> -- select an option -- </option>
            <?php foreach ($data['data']->f5 as $evalu):?>
              <?php if ($evalu->id == $data['data']->f1->status_evaluacion): ?>
                    <option selected value="<?php echo $evalu->id; ?>">
                      <?php echo $evalu->value; ?>
                    </option>
              <?php else: ?>
                    <option value="<?php echo $evalu->id; ?>">
                      <?php echo $evalu->value; ?>
                    </option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <input type="submit" value="actualizar">
        </div>
      </form>
    <div>
    </div>
  </body>
</html>
