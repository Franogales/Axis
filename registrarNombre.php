<!DOCTYPE html>
<html>
  <head>
    <?php session_start(); ?>
    <meta charset="utf-8">
    <title>Axis - Registrar Nombre</title>
  </head>
  <link rel="stylesheet" href="styleasignar.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

  <body>
    <?php if (isset($_SESSION["mensaje"])) {?>
      <div class="alert alert-success center" id="mensaje">
        <h3 style="center"><?php echo $_SESSION['mensaje'] ?></h3>
      </div>
    <?php } ?>

    <div class="login">
    <div class="login-triangle"></div>


    <h2 class="login-header">Registrar Nombre</h2>


    <form class="login-container" action="class.registro.php" method="post">
      <p><input type="text" placeholder="Nombre" name="in_nombre"></p>
      <p><input type="submit" value="Registrar"></p>
    </form>
  </div>
  <?php unset($_SESSION["mensaje"]) ?>
  <script type="text/javascript">
  setTimeout(function() {
    $('#mensaje').fadeOut('fast');
}, 3000); // <-- time in milliseconds
  </script>
  </body>
</html>
