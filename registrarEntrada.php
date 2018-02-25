<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Axis - Asignar Codigo</title>
  </head>
  <link rel="stylesheet" href="styleasignar.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
  <body>
    <?php session_start();?>

    <?php if (isset($_SESSION["mensaje"])) {?>
      <div class="alert alert-success center" id="mensaje">
        <h3 style="center"><?php echo $_SESSION['mensaje'] ?></h3>
      </div>
    <?php } ?>
    <div class="login">
    <div class="login-triangle"></div>

    <h2 class="login-header">Check in</h2>

    <form class="login-container" action="class.registro.php" method="post">
      <p><input type="text" placeholder="Codigo" name="in_codigo"></p>
      <p><input type="submit" value="checkin"></p>
    </form>

  </div>
  <?php unset($_SESSION["mensaje"]) ?>
  <script type="text/javascript">
  setTimeout(function() {
    $('#mensaje').fadeOut('fast');
}, 1000); // <-- time in milliseconds
  </script>
  </body>
</html>
