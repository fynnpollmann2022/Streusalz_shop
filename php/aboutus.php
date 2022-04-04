<?php

include 'Twig.php';
session_start();
echo Twig()->render("aboutus.html.twig",['username' => $_SESSION['username'],
                                                'email' => $_SESSION['email'],]);




