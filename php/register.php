<?php 
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, 
    "debug" => true ]);
    include ('header.php'); ?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account erstellen</title>
  </head>
  <body>
     <div class=" wrapper_produkte">
       <h1>Account erstellen</h1>
            <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="mail" placeholder="E-Mail" required  minlength="5"  ><br>
            <input type="password" name="pw" placeholder="Passwort" required  minlength="8"  ><br>
            <input type="password" name="pw2" placeholder="Passwort wiederholen" required minlength="8" ><br>
            <button type="submit" name="submit">Erstellen</button>
            </form>
            <br>
            <a href="index.php">Hast du bereits einen Account?</a>
      </div>
  </body>
</html>


 <?php  echo $twig->render("footer.html.twig"); ?>

 <?php
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
            $query = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, EMAIL) VALUES (:user, :pw, :email)");
            $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
           
            $query->bindParam(":mail", $_POST["email"]);
            $query->bindParam(":user", $_POST["username"]);
            $query->bindParam(":pw", $hash);
            $query->execute();
          
            echo "Dein Account wurde angelegt";
            header("Location: startseite.php");
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
?>
