<?php
include "connexionController.php";
$mysqlcon = new MysqlConnect('localhost','root','MZROCLA','axis');
$conn = $mysqlcon->getMysqli();
$q = $_GET['q'];

if (strlen($q) >= 3) {

  $sql = "SELECT nombre from asistencia where nombre like '%$q%' LIMIT 5";

  $result = $conn->query($sql);
  while ($row =  $result->fetch_assoc()) {
    echo  $row['nombre']."=> \n";

  }
}

 ?>
