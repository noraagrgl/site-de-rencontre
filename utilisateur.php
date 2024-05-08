<?php
    session_start();
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: acceuil.html");
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CY-Rencontres</title>
    <link rel="stylesheet" type="text/CSS" href="utilisateur.css">
    <script src="utilisateur.js"></script>
</head>
<body>

    <div id="containerA">
        <span id="Accueil" class="bouton"> <a href="utilisateur.php">Accueil</a></span>
        <span id="Profil" class="bouton"> <a href="Uprofil.php">Profil</a></span>
        <span id="Messagerie" class="bouton"> <a href="Umessagerie.php">Messagerie</a></span>
        <span id="Parametres" class="bouton"> <a href="Uparametre.php">Paramètres</a></span>
        <span id="Deconnexion" class="bouton"> <a href="deconnexion.php">Déconnexion</a></span>
    </div>





      <h1>Bienvenue <?= $_SESSION['pseudo'] ?> </h1>
      <br><br><br>
    
    

      <?php
      
      $fichier=fopen("utilisateurs.csv", "r");
      //lecture du fichier ligne par ligne et s'arrete a la fin quand fgetcsv renvoie faux
      while (($ligne = fgetcsv($fichier)) !== false) {

            if(isset($ligne[4]) && isset($ligne[8])) {

                //Verification pour presenter le sexe oppose
                if($_SESSION["sexe"] != $ligne[4]){
                    //Verification pour presenter le meme type de relation
                    if($_SESSION["type_relation"] == $ligne[8]){
                        //Afficher cet utilisateur pseudo + description

                        ?>

                        <div id="user_print">
                            <p><img src="image/<?= $ligne[10] ?>" class="image"><b><?= $ligne[2] ?></b></p>
                            <p><?= $ligne[9] ?></p>
                            <a href="Umessagerie.php">Envoyer un message</a>
                        </div>



                        <?php



                    }
                 
                }
            }
      }
        
      ?>

      <!--<p><b><?= $user_print['pseudo'] ?></b></p>-->

</body>
</html>
