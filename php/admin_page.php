<?php
include 'Twig.php';

session_start();
if(!$_SESSION["admin"]){
    header("Location: index.php");
    exit;
}
//produkte anzeigen
require("mysql.php");
$query = ("SELECT * FROM tbl_product");
$abfrage = $mysql->prepare($query);
$abfrage->execute();
$ergebnismenge = $abfrage->fetchAll();

//infos updaten
if(isset($_POST["submit"])){
    $query = $mysql->prepare("UPDATE tbl_product SET NAME=?, PRICE=?, VALUE_LAGER=?, IMG= ?, TITEL=?, BESCHREIBUNG=? WHERE ID=? ");
    $query->execute([$_POST["name"], $_POST["price"], $_POST["value"], $_POST["image"], $_POST["titel"], $_POST["beschreibung"],$_POST["id"]]);
    header("Refresh:0");
}
//benutzer anzeigen
require("mysql.php");
$query = ("SELECT * FROM accounts");
$abfrage_user = $mysql->prepare($query);
$abfrage_user->execute();
$result_user= $abfrage_user->fetchAll();

//infos updaten
if(isset($_POST["submit_user"])){
    $query = $mysql->prepare("UPDATE accounts SET USERNAME=?, EMAIL=?, IS_ADMIN=? WHERE ID=?  ");
    $query->execute([$_POST['username'], $_POST["email"], (int)$_POST["is_admin"], $_POST["id_user"]]);
    header("Refresh:0");
}


echo Twig()->render('admin_page.html.twig',
    [
        'users' => $result_user,
        'products' => $ergebnismenge,
        'username' => $_SESSION['username'],
        'email' => $_SESSION['email'],
        'admin' => $_SESSION['admin'],
    ]
);


