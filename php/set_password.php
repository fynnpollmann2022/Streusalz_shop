<?php
include "Twig.php";

if(isset($_GET["token"])){
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE TOKEN = :token"); //Username überprüfen
    $stmt->bindParam(":token", $_GET["token"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count != 0){
        if(isset($_POST["submit"])){
            if($_POST["pw1"] == $_POST["pw2"]){
                $hash = password_hash($_POST["pw1"], PASSWORD_BCRYPT);
                $stmt = $mysql->prepare("UPDATE accounts SET PASSWORD = :pw, TOKEN = null WHERE TOKEN = :token");
                $stmt->bindParam(":pw", $hash);
                $stmt->bindParam(":token", $_GET["token"]);
                $stmt->execute();
                echo 'Das Passwort wurde geändert <br>
                    <a href="index.php"></a>Login</a>';
            } else {
                echo "Die Passwörter stimmen nicht überein";
            }
        }
    include "../templates/set_password.html.twig";
    } else {
        echo "Der Token ist ungültig";
    }
} else {
    echo "Kein gültiger Token gesendet";
}


echo Twig()->render('set_password.html.twig',
    [
        'token' => $_GET["token"],
        'email' => $_POST["email"],
        'pw1' => $_POST["pw1"],
        'pw2' => $_POST["pw2"],
    ]
);