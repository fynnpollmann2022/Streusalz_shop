<?php 
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, 
    'debug' => true
]);
include ('header.php');
 ?>
  

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/main_style.css">
  </head>
  <body>
  <div class=" wrapper_produkte">
    <h1>Anmelden</h1>
    <form action="index.php" method="post">
      <input type="text" name="username" placeholder="Username" required><br>
      <input type="password" name="pw" placeholder="Passwort" required><br>
      <button type="submit" name="submit">Einloggen</button>
    </form>
    <br>
    <a href="register.php">Noch keinen Account?</a>
  </div>  
  </body>
</html>

<?php echo $twig->render("footer.html.twig"); ?>
<?php

  
    if(isset($_POST["submit"])){
     require("mysql.php");
      $query = $mysql->prepare("SELECT * FROM tbl_product WHERE NAME = :name"); 
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
    
?>