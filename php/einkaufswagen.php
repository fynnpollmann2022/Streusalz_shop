<?php 


include 'Twig.php';

 session_start(); 
 if(!isset($_SESSION["username"])){
   header("Location: index.php");
   exit;
 }
;



require("mysql.php");
    $query = ("SELECT * FROM tbl_product"); 
    $abfrage = $mysql->prepare($query);
    $abfrage->execute();
    $ergebnismenge = $abfrage->fetchAll();


echo Twig()->render('einkaufswagen.html.twig', ['products' => $ergebnismenge,
                                                        'username' => $_SESSION['username'],
                                                        'email' => $_SESSION['email'],]);



  
