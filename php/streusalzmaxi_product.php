<?php 
require_once '../vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false, 
    "debug" => true
]);

session_start();
if(!isset($_SESSION["username"])){
  header("Location: index.php");
  exit;
}
include ('header.php');
?>
  

  <html>
    <head>
        <title>Streusalzshop.de</title>
        <link rel="stylesheet" href="../styles/main_style.css">
          <link rel="stylesheet" href="../styles/products_style.css">
          
    </head>
    <body>
        <main>
        <div class=" wrapper_produkte ">
            <h1>Streusalz maxi 20kg</h1>
            <div class="container_product ">

                <img src="https://www.salinen.com/shop/wp-content/uploads/2021/12/salpina-auftausalz-20kg-92700-MAIN.jpg " width="250 " height="250 ">
                <h2>Produkt Beschreibung</h2>
                <p>Deutsches Steinsalz Hier kommt in der Regel helles, aus Deutschland stammendes Salz zur Verwendung. <br> Das Premium-Streusalz weist ein besseres Rieselverhalten auf, ist trockener und hat einen geringeren Staubanteil. <br> Somit ist das
                    Premium-Streusalz für jegliche Streuer geeignet und ist selbst für Streuer mit kleineren Vorratstrichtern problemlos einsetzbar. <br> <br> Optimales Kornspektrum: <br> <br> Während die feinen Kristalle für eine sofort einsetzende Tauwirkung
                    sorgen,
                    <br> Garantieren die gröberen Kristalle die erforderliche Langzeitwirkung bei dickeren Eis- und Schneeschichten<br> <br> -Korngröße: 0-5mm <br> -Entspricht der TL-Streu 2003 <br> -Hoher Anteil tauwirksamer Substanzen<br> -NaCl-Gehalt
                    über 98,2% <br> Nicht zum Verzehr geeignet
                </p>
                <form action="streusalzmaxi_product.php" method="post">
                    <button id="add_card_btn" name="submit" type="submit">Add to Card</button>
                    <input type="number" placeholder="1"  name="value"  required >
                    <input type="hidden" name="id" value="1">
                </form>
            </div>
        </div>
    </main>
    </body>
</html>
<?php echo $twig->render("footer.html.twig");  
require("mysql.php");

if(isset($_POST["submit"])){
    $product_id = $_POST["id"];
    $product_value = $_POST["value"];

    if (!$_POST["value"] > 0) {
       echo"Bitte wert eingeben";
       exit;
    }

    $query = $mysql->prepare("SELECT * FROM tbl_product WHERE id = ?"); 
    $query->execute($product_id);
    $result_fetch = $query->fetch();

    $value = $result_fetch["VALUE"] + (int) $product_value;

    $update = $mysql->prepare("UPDATE tbl_product SET VALUE = ? WHERE id = ?");
    $update->execute([$value,$product_id]);

    header("Location: einkaufswagen.php");
}

