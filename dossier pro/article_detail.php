<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>artile details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <script src="https://kit.fontawesome.com/a3be9883af.js" crossorigin="anonymous"></script>
    <script src="javascript.js"></script>
    <!--icons link-->
</head>

<body>
    <?php include("navbar.php"); ?>
    <!--navbar link avec include-->
    <section class="hero has-text-centered is-dark">
        <div class="hero">
            <p class="title ">
                Bienvenue </p>
            <p class="subtitle">
               Sur la boutique MonArduino974</p>
        </div>
    </section>
   
    <?php 
        $id = $_GET['id'];
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=monarduino974;charset=utf8', 'root', 'Simplon974', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM articles WHERE id="'.$id.'"');
        echo '<div class="container2">';

        while ($donnees = $reponse->fetch()) {     
        echo '<div class="infos">';        
        echo '<div class="miniature_detail"><img class="img" src="' . $donnees['image'] . '"></div>';

        echo '<div class="article_detail">';
        echo '<div class="nom_detail">' . $donnees['nom'] . '</div>';
        echo '<div class="description_article">';
        echo '<p>'.$donnees['description'].'</p>';
        echo '<div class="prix_detail">'.$donnees['prix'].'€</div>';
        echo '<button type="button" class="collapsible"><p>Specifité technique</p></button>';
        echo '<div class="content">';
        echo $donnees['speTech'];
        echo '</div>';
        echo "<form action=\"#\" method=\"post\">\n";
        echo "        <div class=\"quantity\">\n";
        echo "              <input name=\"nombre\"type=\"number\" min=\"1\" max=\"9\" step=\"1\" value=\"1\">\n";
        echo "            </div>\n";
        echo "            <button name=\"submit\"class=\"button is-warning is-light\">\n";
        echo "            <i class=\"fas fa-cart-plus\"></i>Ajouter au panier</button>\n";
        echo '<input type="hidden" name="id_produit" value="' . $donnees['id'] . '">';
        echo '<input type="hidden" name="nom" value="' . $donnees['nom'] . '">';
        echo '<input type="hidden" name="image" value="' . $donnees['image'] . '">';
        echo '<input type="hidden" name="prix" value="' . $donnees['prix'] . '">';
        echo "        </form>\n";
        echo '</div>'; 
        }
        if (isset($_POST["submit"])) {
            echo 'test';
           $requete = 'INSERT INTO panier VALUES
           (NULL, "' . $_POST['id_produit'] . '",
           "' . $_POST['nom'] . '",
           "' . $_POST['image'] . '",
           "' . $_POST['prix'] . '",
           "' . $_POST['nombre'] . '")';
           $resultat = $bdd->query($requete);            
        }
        echo '</div>';
      ?>
    <!-- image en premiere vue -->
  
    <script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
</body>

</html>