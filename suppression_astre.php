<?php if (isset($_POST['supprimer'])) {
    header('location:suppression_astre.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression astre</title>
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
        Supprimer une image</p>
    </div>
  </section>
  <div class="container is-fluid">
  <div class="columns is-multiline">
    <div class="column is-one-quarter">
      <?php $bdd = new PDO('mysql:host=127.0.0.1;dbname=nasa;charset=utf8', 'Root', 'Simplon974', 
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $reponse = $bdd->query('SELECT * FROM hubble');
      while ($donnees = $reponse->fetch()) {
        echo '<form method="post">';
        echo '<input type="hidden" name="id" value="' . $donnees['id'] . '">';
        echo '<input type="text" value="' . $donnees['nom'] . '" class="input is-primary"
         name="nouveau_nom" placeholder="Nouveau nom">';
        echo '<br>';
        echo '<input type="text" value="' . $donnees['image'] . '" class="input is-primary"
         name="nouveau_image" placeholder="Nouvelle image">';
        echo '<br>';
        echo '<input type="text" value="' . $donnees['description'] . '" class="input is-primary"
         name="nouveau_description" placeholder="Nouvelle description">';
        echo  '<br>';
        echo '<input type="textarea" value="' . $donnees['parution'] . '" class="input is-primary"
         name="nouveau_description" placeholder="Nouvelle date  de parution">';
        echo  '<br>';
        echo '<button class="button is-danger" type="submit" name="supprimer"">Supprimer</button> ' . '<br/>';
        
        echo '</form>';
        echo  '<br>';


        if (isset($_POST['supprimer'])) {
          $requete = 'DELETE FROM hubble WHERE id="' . $_POST['id'] . '"';
          $resultat = $bdd->query($requete);
        }
    }
      ?>    
      </div>
      </div>
    </div>
</body>
</html>