<?php



function Twig(){
    require_once '../vendor/autoload.php';
    $loader = new FilesystemLoader('../templates');
    $twig = new Environment($loader, [
        'cache' => false,
        'debug' => true
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());


    return $twig;
}