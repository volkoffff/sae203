<?php
  // LIBRAIRIE "lib_crud.inc.php"
  // 2022 - BUT MMI - IUT Troyes - URCA
  // JL

  // insertion des dépendances
  require 'secretxyz123.inc.php';

  // connexion à la base de données
  function connexionBD()
  {
    // on initialise la variable de connexion à null
    $mabd = null;
    try {
      // on essaie de se connecter
      // le port et le dbname ci-dessous sont À ADAPTER à vos données
      $mabd = new PDO('mysql:host=127.0.0.1;port=3306;
                dbname=sae203;charset=UTF8;', 
                LUTILISATEUR, LEMOTDEPASSE);
      // on passe le codage en utf-8
      $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
      // s'il y a une erreur, on l'affiche
      echo '<p>Erreur : ' . $e->getMessage() . '</p>';
      die();
    }
    // on retourne la variable de connexion
    return $mabd;
  }






  // déconnexion de la base de données
  function deconnexionBD(&$mabd) {
    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
  }
      // affichage du catalogue des albums
      function afficherCatalogue($mabd) {
        $req = "SELECT * FROM table_lego 
                INNER JOIN table_saga ON table_lego._sg_id = table_saga.sg_id";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        echo '<div class="ma3">';
        foreach ($resultat as $value) {
            // echo $value['lg_nom'] . ' , ' . $value['lg_prix'] . ' euro ';
            // echo '<br> genre: ' . $value['lg_genre']. '<hr>';
    
            echo '<div class="carte">';
            echo '<div class="g1">';
            echo '<h4 id="titre_produit">' .$value['lg_nom']. '</h4>';
            echo '</div>';
            echo '<div class="g2">';
            echo '<img class="boule_couleur" src="images/'.$value['sg_couleur'].'">';
            echo '<img class="image_list" src="images/'.$value['lg_image'].'">';
            echo '</div>';
            echo '<div class="g3">';
            echo '<img src="images/'.$value['sg_nom'].'">';
            echo '</div>';
            echo '<div class="g4">';
            echo '<div class="g41">';
            echo '<img src="images/block.png">';
            echo '<p>'.$value['lg_pieces'].'</p>';
            echo '</div>';
            echo '<div class="g41">';
            echo '<img id="img_enfant" src="images/enfant.png">';
            echo '<p>'.$value['lg_age'].' ans</p>';
            echo '</div>';
            echo '<div class="g42">';
            echo '<p id="prix">'.$value['lg_prix'].' €</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="g5">';
            echo '<p>catégorie:<p>';
            echo '<p>'.$value['sg_genre']. '/</p>';
            echo '<p>'.$value['lg_genre']. '</p>'; 
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

