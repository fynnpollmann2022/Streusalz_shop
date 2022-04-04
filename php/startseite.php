<?php

include 'Twig.php';
session_start();

require("mysql.php");
$query = ("SELECT * FROM tbl_product");
$abfrage = $mysql->prepare($query);
$abfrage->execute();
$ergebnismenge = $abfrage->fetchAll();


echo Twig()->render('startseite.html.twig', ['products' => $ergebnismenge,
                                                    'username' => $_SESSION['username'],
                                                    'email' => $_SESSION['email'],]);


  

