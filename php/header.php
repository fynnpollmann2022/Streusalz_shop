<?php 
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, 
    "debug" => true
]);


$template = $twig->load('header.html.twig');
 echo $template->render([
     'username' => $_SESSION['username'],
     'email' => $_SESSION['email'],
 ]);
 ?>
