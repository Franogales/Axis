<?php

 // $server = 'localhost';
 // $username = 'root';
 // $pass = 'MZROCLA';
 // $db = 'axis';

 class MysqlConnect
{
   private $db_host;
   private $db_usermame;
   private $db_password;
   private $db_database;
   private $mysqli;

   public function __construct($db_host,$db_usermame,$db_password,$db_database)
   {
       $this->db_host = $db_host;
       $this->db_usermame = $db_usermame;
       $this->db_password = $db_password;
       $this->db_database = $db_database;

       $this->mysqli = mysqli_connect("$this->db_host", "$this->db_usermame", "$this->db_password", "$this->db_database") or die("Can't connect");
       $this->mysqli->select_db("$this->db_database") or die("Can't select database");
   }

   public function getMysqli()
   {
       return $this->mysqli;
   }
}


 ?>
