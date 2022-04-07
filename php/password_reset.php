<?php
include "Twig.php";

if (isset($_POST["submit"])) {
    require("mysql.php");
    $stmt = $mysql->prepare("SELECT * FROM accounts WHERE EMAIL = :email");
    $stmt->bindParam(":email", $_POST["email"]);
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count != 1){
        $token = generateRandomString(25);
        $stmt = $mysql->prepare("UPDATE accounts SET TOKEN = :token WHERE EMAIL = :email");
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->execute();
        mail($_POST["email"], "Passwort zurücksetzen", "http://localhost/Streusalz_Website/php/set_password.php?token=".$token);
        echo "Die Email wurde versendet";
    } else {
        echo "Diese Email ist nicht angemeldet";
    }
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo Twig()->render('password_reset.html.twig',
    [
        'email' => $_POST["email"],
    ]
);
