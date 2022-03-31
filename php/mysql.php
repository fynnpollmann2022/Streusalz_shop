<?php
 $host = "mysql:host=localhost;dbname=streusalz";
 $user = "root";
 $passwort = "";
 try{
     $mysql = new PDO($host, $user, $passwort);
 } catch (PDOException $e){
     echo "SQL Error: ".$e->getMessage();
 }
 ?>