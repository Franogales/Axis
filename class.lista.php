<?php
include_once('connexionController.php');
Class Lista{
private $db;
  function __construct(){
    $mysqlcon = new MysqlConnect('localhost','','','');
    $this->db = $mysqlcon->getMysqli();
  }


  public function getLista(){
    $sql = "SELECT * from asistencia1";
    $result = $this->db->query($sql);
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
        <td>".$row['nombre']."</td>
        <td>".$row['dia1']."</td>
        <td>".$row['dia2']."</td>
        <td>".$row['dia3']."</td>
      </tr>";

    }

  }

}
$lista = new Lista();


 ?>
