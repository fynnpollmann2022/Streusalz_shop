<?php 
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, 
    "debug" => true
]);
session_start();
include ('header.php');

 ?>
<html>
    <head>
        <title>Streusalzshop.de</title>
            <link rel="stylesheet" href="../styles/startseite_style.css">
            <link rel="stylesheet" href="../styles/main_style.css">

    </head>
    <body> 
       <main>
        <div class=" wrapper_produkte">
            <h1>Streusalz</h1>
            <div class="container_produkte">
                <div class="container_produkt ">
                    <div class="produkt_image_container ">
                        <a href="../php/streusalzmaxi_product.php"><img src="https://www.salinen.com/shop/wp-content/uploads/2021/12/salpina-auftausalz-20kg-92700-MAIN.jpg " width="93 " height="93 "></a>
                        <div>Streusalz maxi 20kg </div>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor
                        mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet
                    </div>
                    </div>
                    <div class="container_produkt ">
                    <div class="produkt_image_container "> <img src="https://m.media-amazon.com/images/I/71tivzEieDL._AC_SL1500_.jpg" alt=" " width="93 " height="93 " srcset=" ">
                        <div>Streusalz mini 5kg </div>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor
                        mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet
                    </div>
                    </div>
                    <div class="container_produkt ">
                    <div class="produkt_image_container "> <img src="https://live.mrf.io/statics/i/ps/2.bp.blogspot.com/-FZrtiZZzURM/VKF5iFRAaVI/AAAAAAAAc7U/D5PcW-2aWCg/s1600/salz.jpg?width=1200&enable=upscale " alt=" " width="100 " height="90
                    " srcset=" ">
                        <div>Streusalz green maxi 20kg </div>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor
                        mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet
                    </div>
                    </div>
                    <div class="container_produkt ">
                    <div class="produkt_image_container "> <img src="https://m.media-amazon.com/images/I/61incgpXekL._AC_SL1500_.jpg " width="100 " height="90 ">
                        <div>NOCOR-Taugranulat 5kg</div>
                    </div>
                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit, vulputate eu pharetra nec, mattis ac neque. Duis vulputate commodo lectus, ac blandit elit tincidunt id. Sed rhoncus, tortor sed eleifend tristique, tortor
                        mauris molestie elit, et lacinia ipsum quam nec dui. Quisque nec mauris sit amet elit iaculis pretium sit amet
                    </div>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>

<?php echo $twig->render("footer.html.twig");?>
  

