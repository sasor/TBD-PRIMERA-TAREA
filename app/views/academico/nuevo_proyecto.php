<?php
    //var_dump($data['data']);
?>
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
    <main>
      <header>
        <h3>NUEVO PROYECTO</h3>
      </header>
      <section>
        <form action="/academico/crear_proyecto" method="POST">
          <div>
            <h4>TITULO PROYECTO</h4>
            <textarea required rows="2" cols="100" name="titulo"></textarea>
          </div>
          <div>
            <h4>RESUMEN PROYECTO</h4>
            <textarea required rows="4" cols="100" name="resumen"></textarea>
          </div>
          <!--<div>
            <h4>PALABRAS CLAVE</h4>
            <select>
              <option value=""></option>
            </select>
          </div>-->
          <div>
            <h4>TIPO DE PROYECTO</h4>
            <?php ?>
            <?php if (count($data['data']->tipos) != 0): ?>
              <select required name="tipo">
                <option disabled selected value> -- select an option -- </option>
              <?php foreach ($data['data']->tipos as $tipo):?>
                <option value="<?php echo $tipo->tipo_proyecto_id; ?>">
                  <?php echo $tipo->tipo_proyecto; ?>
                </option>
              <?php endforeach; ?>
              </select>
            <?php endif; ?>
          </div>
          <div>
            <h4>DEPENDENCIA</h4>
            <?php if (count($data['data']->dependencias) != 0): ?>
              <select required name="dependencia">
                <option disabled selected value> -- select an option -- </option>
              <?php foreach ($data['data']->dependencias as $dependencia):?>
                <option value="<?php echo $dependencia->dependencia_academica_id; ?>">
                  <?php echo $dependencia->dependencia_academica; ?>
                </option>
              <?php endforeach; ?>
              </select>
            <?php endif; ?>
          </div>
          <div>
            <h4>AREA ACADEMICA</h4>
            <?php if (count($data['data']->areas) != 0): ?>
              <select required name="area">
                <option disabled selected value> -- select an option -- </option>
              <?php foreach ($data['data']->areas as $area):?>
                <option value="<?php echo $area->area_academica_id; ?>">
                  <?php echo $area->area_academica; ?>
                </option>
              <?php endforeach; ?>
              </select>
            <?php endif; ?>
          </div>
          <div>
            <input type="submit" value="crear">
          </div>
        </form>
      </section>
    </main>
  </body>
</html>
