<?php

function Twig() {
    require_once '../vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('../templates');
    $twig = new \Twig\Environment($loader, [
        'debug' => true
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());


    return $twig;
}