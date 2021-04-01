<?php if (isset($_POST['modifier'])) {
    header('location:ajout_photo.php');
} 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ajout articles monarduino974</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  <script src="https://kit.fontawesome.com/a3be9883af.js" crossorigin="anonymous"></script>
  <!--icons link-->
</head>

<body>
  <?php include("navbar.php"); ?>
  <section class="hero has-text-centered is-dark">
    <div class="hero">
      <p class="title ">
        Ajouté des articles pour la boutique </p>
    </div>
  </section>

  <div class="columns is-mobile">
    <div class="column is-three-quarters-mobile is-two-thirds-tablet is-half-desktop is-one-third-widescreen is-one-quarter-fullhd">
      <form action="#" method="post">
        <input class="input is-dark" type="text" name="nom" placeholder=" Nom de l'astre">
        <input class="input is-dark" type="text" name="image" placeholder=" Image">
        <input class="input is-dark" type="text" name="description" placeholder=" Description">
        <input class="input is-dark" type="textarea" name="speTech" placeholder=" Spécificité Technique">
        <input class="input is-dark" type="number" name="prix" placeholder=" Prix">


        <button type="submit" class="button is-large is-black"><i class="fas fa-rocket"></i></button>

        <?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=monarduino974;charset=utf8', 'root', 'Simplon974', 
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $reponse = $bdd->query('SELECT * FROM articles');
        if (isset($_POST['nom'])) {
          $requete = 'INSERT INTO articles VALUES(NULL, "' .
            $_POST['nom'] . '", "' .
            $_POST['image'] . '", "' .
            $_POST['description'] . '", "' .
            $_POST['speTech'] . '", "' .
            $_POST['prix'] . '", )';
          $resultat = $bdd->query($requete);
        }
        ?>
      </form>
    </div>
                <?php 
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=monarduino974;charset=utf8', 'root', 'Simplon974', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM articles');
    echo '<div class="container2">';

    while ($donnees = $reponse->fetch()) {     
        echo '<div class="article">';
        echo '<div class="nom">' . $donnees['nom'] . '</div>';
        echo '<div class="miniature"><img class="img" src="' . $donnees['image'] . '"></div>';
        echo '<div class="description">';
        echo '<span>'.$donnees['description'].'</span>';
        echo '</div>';
        echo '<div class="prix">'.$donnees['prix'].'€</div>';
        echo '</div>';

    }
        echo '</div>';
      ?>
    </div>
  </div>
</body>


</html>