<?php
session_start();
include 'Twig.php';


if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}

require("mysql.php");
if (isset($_GET['id'])){
    $abfrage = $mysql ->prepare ('SELECT * FROM tbl_product WHERE id = ?');
    $abfrage->execute([$_GET['id']]);
    $product = $abfrage->fetch(PDO::FETCH_ASSOC);
    if (!$product){
        exit('Produkt existiert nicht');
    }
}
//einkaufswagen abfrage
if(isset($_POST["submit"])){
    $product_id = $_POST["id"];
    $product_value = $_POST["value"];

    if (!$_POST["value"] > 0) {
        echo"Bitte wert eingeben";
        exit;
    }

    $query = $mysql->prepare("SELECT * FROM tbl_product WHERE id = ?");
    $query->execute([$product_id]);

    $result_fetch = $query->fetch();

    $value = $result_fetch["VALUE"] + (int) $product_value;

    $update = $mysql->prepare("UPDATE tbl_product SET VALUE = ? WHERE id = ?");
    $update->execute([$value,$product_id]);

    header("Location: einkaufswagen.php");
}


echo Twig()->render('product_details.html.twig', ['product' => $product,
                                                        'username' => $_SESSION['username'],
                                                        'email' => $_SESSION['email'],]);