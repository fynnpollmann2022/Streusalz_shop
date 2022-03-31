<?php
 $host = "mysql:host=127.0.0.1;dbname=userdata";
 $user = "root";
 $passwort = "";
 try{
     $mysql = new PDO($host, $user, $passwort);
 } catch (PDOException $e){
     echo "SQL Error: ".$e->getMessage();
 }
 ?>