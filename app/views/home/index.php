<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <nav>
      <?php include(APP.DS.'app'.DS.'views'.DS.'layout'.DS.'header.php');?>
      <ul>
        <?php if (in_array(1, $_SESSION['usr']->rol)):?>
            <li><a href="/administrador">administrador</a></li>
        <?php endif;?>
        <?php if (in_array(2, $_SESSION['usr']->rol)):?>
            <li><a href="/director">director</a></li>
        <?php endif;?>
        <?php if (in_array(3, $_SESSION['usr']->rol)):?>
            <li><a href="/revisor">revisor</a></li>
        <?php endif;?>
        <?php if (in_array(4, $_SESSION['usr']->rol)):?>
            <li><a href="/academico">academico</a></li>
        <?php endif;?>
      </ul>
    </nav>
  </body>
</html>
