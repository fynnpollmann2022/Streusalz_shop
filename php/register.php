<?php
include "Twig.php";
include ('header.php');

    if(isset($_POST["submit"])){
      require("mysql.php");

      if($_POST['username']){
        $query = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user");
        $query->bindParam(":user", $_POST['username']);
        $query->execute();
      
        $userResult = $query->fetchAll(PDO::FETCH_ASSOC);
        if(empty($userResult)) {
          if($_POST["pw"] == $_POST["pw2"]){
            //User anlegen
            $query = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, EMAIL) VALUES (:user, :pw, :mail)");
            $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
            
            $query->bindParam(":mail", $_POST["mail"]);
            $query->bindParam(":user", $_POST["username"]);
            $query->bindParam(":pw", $hash);
            $query->execute();
          
            echo "Dein Account wurde angelegt";
            header("Location: index.php");
          }
          else {
            echo "Die Passwörter stimmen nicht überein";
          }
        } 
        else {
          echo "Es gibt schon einen User mit diesem Namen";
        }
      } 
    }

echo Twig()->render('register.html.twig');
echo $twig->render("footer.html.twig");