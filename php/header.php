<?php
include 'Twig.php';


$template = $twig->load('header.html.twig');
 echo $template->render([
     'username' => $_SESSION['username'],
     'email' => $_SESSION['email'],
 ]);

