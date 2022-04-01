<?php
include 'Twig.php';
include 'header.php';

    if(isset($_POST["submit"])){
     require("mysql.php");
      $query = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
      $query->bindParam(":user", $_POST["username"]);
      $query->execute();
      $count = $query->rowCount();
      
      if($count == 1){
        //Username ist frei
        $row = $query->fetch();
        if(password_verify($_POST["pw"], $row["PASSWORD"])){
          session_start();  
          $_SESSION["email"] = $row["EMAIL"] ;    
          $_SESSION["username"] = $row["USERNAME"] ;
          header("Location: startseite.php");
        } else {
          echo "Der Login ist fehlgeschlagen";
        }
      }
       else {
        echo "Der Login ist fehlgeschlagen";
      }
    }

echo Twig()->render("index.html.twig");

echo $twig->render("footer.html.twig");