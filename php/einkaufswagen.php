<?php 


include 'Twig.php';

 session_start(); 
 if(!isset($_SESSION["username"])){
   header("Location: index.php");
   exit;
 }
 include ('header.php'); 



require("mysql.php");
    $query = ("SELECT * FROM tbl_product"); 
    $abfrage = $mysql->prepare($query);
    $abfrage->execute();
    $ergebnismenge = $abfrage->fetchAll();

    echo Twig()->render('einkaufswagen.html.twig', ['products' => $ergebnismenge]);
  

 echo $twig->render("footer.html.twig");
  
