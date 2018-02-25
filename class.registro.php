<?php
/**
 *
 */
 require_once('connexionController.php');
class Registro
{
  private $db;

  function __construct()
  {
    $mysqlcon = new MysqlConnect('localhost','root','MZROCLA','axis');
    $this->db = $mysqlcon->getMysqli();
  }

  function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

  public function checkIn($code){
    session_start();
    $codigo = $this->db->real_escape_string($code);
    $date = date('Y-m-d G:i:s');
    if ($this->verDia($codigo) =="dia1") {
      $dia = "dia1";
    }elseif ($this->verDia($codigo) =="dia2") {
      $dia = "dia2";
    }elseif($this->verDia($codigo) == "dia3"){
      $dia = "dia3";
    }elseif($this->verDia($codigo) == "empty"){

      $_SESSION["mensaje"] = "no esta registrado";
      $url = "registrarEntrada.php";
      $this->redirect($url);
    }else{
      $_SESSION['mensaje'] = "Ya esta registrado en los 3 dias";
    }
    if (isset($dia)) {
      $sql = "UPDATE asistencia set $dia = '$date' where codigo = $codigo";
      if ($this->db->query($sql)===true) {
        $_SESSION["mensaje"] = "OK";
        $this->redirect("registrarEntrada.php");
      }
    }else{
      $_SESSION["mensaje"] = "no se puede registrar entrada, \n revisa la asistencia";
      $this->redirect("registrarEntrada.php");
    }



  }

  public function verDia($codigo){
    $sql = "select dia1, dia2,dia3 from asistencia where codigo = $codigo LIMIT 1";
    $result = $this->db->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $dia1 = $row['dia1'];
        $dia2 = $row['dia2'];
        $dia3 = $row['dia3'];
        if ($dia1 == null && $dia2 == null && $dia3 == null) {
          return "dia1";
        }elseif ($dia1 != null && $dia2 == null) {
          return "dia2";
        }elseif ($dia2 =! null && $dia3 == null) {
          return "dia3";
        }else{
          return "completed";
        }

      }
    }else{
      return "empty";
    }
  }

  public function registrarNombre($name){
    session_start();
    $nombre = $this->db->real_escape_string($name);
    $sql = "INSERT INTO asistencia(nombre) values ('$nombre')";
    if ($this->db->query($sql)===true) {

      $_SESSION["mensaje"] = "registrado satisfactorio";
      $this->redirect("registrarNombre.php");

    }else{
      $_SESSION["mensaje"] = "FAILED: ".$this->db->error;
      $this->redirect("registrarNombre.php");
    }
  }

  public function asignarCodigo($code,$name){
    session_start();
    $nombre = $this->db->real_escape_string($name);
    $codigo = $this->db->real_escape_string($code);
    $sql = "UPDATE asistencia set codigo = '$codigo' where nombre = '$nombre'";
    if ($this->db->query($sql)===true) {
      $_SESSION["mensaje"] =  "asignado correctamente";
      $this->redirect("asignarCodigo.php");
    }else{
      $_SESSION["mensaje"] = "FAILED: ".$this->db->error;
      $this->redirect("asignarCodigo.php");
    }
  }

}



$registro = new Registro();
if (isset($_POST['in_codigo']) && !isset($_POST['in_nombre'])) {
  $registro->checkIn($_POST['in_codigo']);
}elseif(isset($_POST['in_nombre']) && !isset($_POST['in_codigo'])){
  $registro->registrarNombre($_POST['in_nombre']);
}elseif(isset($_POST['in_nombre']) && isset($_POST['in_codigo'])){
  $registro->asignarCodigo($_POST['in_codigo'],$_POST['in_nombre']);
}



 ?>
