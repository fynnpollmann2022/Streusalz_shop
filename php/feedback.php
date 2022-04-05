<?php
include 'Twig.php';
session_start();

if(!isset($_SESSION["username"])){
    header("Location: index.php");
    exit;
}

if(isset($_POST["submit"])) {
    mail("pollmannfynn@gmail.com", "Kontaktformular", 'Name: ' . $_SESSION["username"] . ' Email: ' . $_SESSION['email'] . ' Sterne: ' . $_POST["sterne"] . ' Nachricht: ' . $_POST["message"]);
}

echo Twig()->render('feedback.html.twig',
    [
         'sterne' => $_POST["sterne"],
         'message' => $_POST["message"],
         'username' => $_SESSION['username'],
        'email' => $_SESSION['email'],
        'admin' => $_SESSION['admin'],
    ]
);
