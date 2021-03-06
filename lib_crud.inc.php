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
            echo '<img class="boule_couleur" src="images/uploads/'.$value['sg_couleur'].'">';
            echo '<img class="image_list" src="images/uploads/'.$value['lg_image'].'">';
            echo '</div>';
            echo '<div class="g3">';
            echo '<img src="images/uploads/'.$value['sg_nom'].'">';
            echo '</div>';
            echo '<div class="g4">';
            echo '<div class="g41">';
            echo '<img src="images/uploads/block.png">';
            echo '<p>'.$value['lg_pieces'].'</p>';
            echo '</div>';
            echo '<div class="g41">';
            echo '<img id="img_enfant" src="images/uploads/enfant.png">';
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


//afficher liste pour gérer la bdd
function afficherListe($mabd) {
    $req = "SELECT * FROM table_lego 
    INNER JOIN table_saga ON table_lego._sg_id = table_saga.sg_id";
try {
$resultat = $mabd->query($req);
} catch (PDOException $e) {
// s'il y a une erreur, on l'affiche
echo '<p>Erreur : ' . $e->getMessage() . '</p>';
die();
}
foreach ($resultat as $value) {
echo '<table>'."\n";
echo '<thead><tr><th>Photo</th><th>Nom lego</th><th>Prix (&euro;)</th><th>Pieces</th><th>Genre</th><th>age</th><th>Modifier</th><th>Supprimer</th></tr></thead>'."\n";
echo '<tbody>'."\n";
foreach ($resultat as $value) {
echo '<tr>'."\n";
echo '<td><img class="photo" src="../images/uploads/'.$value['lg_image'].'" width=140px" </td>'."\n";
echo '<td>'.$value['lg_nom'].'</td>'."\n";
echo '<td>'.$value['lg_prix'].'</td>'."\n";
echo '<td>'.$value['lg_pieces'].'</td>'."\n";
echo '<td>'.$value['lg_genre'].'</td>'."\n";
echo '<td>'.$value['lg_age'].'</td>'."\n";
echo '<td><a href="table1_update_form.php?num='.$value['lg_id'].'">Modifier</a></td>'."\n";
echo '<td><a href="table1_delete.php?num='.$value['lg_id'].'">Supprimer</a></td>'."\n";
echo '</tr>'."\n";
}
echo '</tbody>'."\n";
echo '</table>'."\n";

}

    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
}




// afficher les auteurs (prénom et nom) dans des champs "option"
    function afficherAuteursOptions($mabd) {
    	// on sélectionne tous les auteurs de la table auteurs
        $req = "SELECT * FROM table_saga";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // pour chaque auteur, on met son id, son prénom et son nom 
        // dans une balise <option>
        foreach ($resultat as $value) {
            echo '<option value="'.$value['sg_id'].'">'; // id de l'auteur
            echo $value['sg_nom']; // prénom espace nom
            echo '</option>'."\n";
        }
    }


    // fonction d'ajout d'une BD dans la table bande_dessinees
    function ajouterBD($mabd, $nom, $prix,  $pieces, $nouvelleImage, $genre, $age, $legosaga)
    {
        $req = 'INSERT INTO table_lego(lg_nom,lg_prix, lg_pieces,lg_image,lg_genre,
         lg_age,_sg_id) VALUES ("'.$nom.'", '.$prix.' , '.$pieces.', "'.$nouvelleImage.'" , "'.$genre.'", '.$age.', '.$legosaga.')';
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La boite lego à était ajouté ' . $nom . ' a été ajoutée au catalogue.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
            die();
        }
    }


    // fonction d'effacement d'une BD
    function effacerBD($mabd, $id) {
        $req = 'DELETE FROM table_lego where lg_id='.$id;
        echo '<p>'.$req.'</p>'."\n";
        try{
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount()==1) {
            echo '<p>La boite de lego '.$id.' a été supprimée du catalogue.</p>'."\n";
        } else {
            echo '<p>Erreur lors de la suppression.</p>'."\n";
            die();
        }
    }


    // fonction de récupération des informations d'une BD
    function getBD($mabd, $idlego) {
        $req = 'SELECT * FROM table_lego where lg_id='.$idlego;
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }


	// afficher le "bon" auteur parmi les auteurs (prénom et nom)
   // dans les balises "<option>"
	function afficherAuteursOptionsSelectionne($mabd, $idlego) {
        $req = "SELECT * FROM table_saga";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        foreach ($resultat as $value) {
            echo '<option value="'.$value['sg_id'].'"';
            if ($value['sg_id']==$idlego) {
                echo ' selected="selected"';
            }
            echo '>';
            echo $value['sg_nom'];
            echo '</option>'."\n";
        }
    }






	// fonction de modification d'une BD dans la table bande_dessinees
    function modifierBD($co, $id ,$nom, $prix,  $pieces, $nouvelleImage, $genre, $age, $legosaga)
    {
        $req = 'UPDATE table_lego
                SET lg_nom = "'.$nom.'",
                    lg_prix = '.$prix.',
                    lg_pieces = '.$pieces.',
                    lg_image = "'.$nouvelleImage.'",
                    lg_genre = "'.$genre.'",
                    lg_age = '.$age.',
                    _sg_id = '.$legosaga.'
                WHERE lg_id='.$id;
        echo '<p>' . $req . '</p>' . "\n";
        try {
            $resultat = $co->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La boite de lego ' . $nom . ' a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }









    // Génération de la liste des auteurs dans le formulaire de recherche
    function genererDatalistAuteurs($mabd) {
        // on sélectionne le nom et prénom de tous les auteurs de la table auteurs
        $req = "SELECT lg_nom FROM table_lego";
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // pour chaque auteur, on met son nom et prénom dans une balise <option>
        foreach ($resultat as $value) {
            echo '<option value="'.$value['lg_nom'].'">'."\n"; 
        } 
    }


// affichage des resultats de recherche
function afficherResultatRecherche($mabd) {
    $req = "SELECT * FROM table_lego 
    INNER JOIN table_saga ON table_lego._sg_id = table_saga.sg_id 
    WHERE lg_nom like '%".$_POST['nom'].'%'."'";
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
        echo '<img class="boule_couleur" src="images/uploads/'.$value['sg_couleur'].'">';
        echo '<img class="image_list" src="images/uploads/'.$value['lg_image'].'">';
        echo '</div>';
        echo '<div class="g3">';
        echo '<img src="images/uploads/'.$value['sg_nom'].'">';
        echo '</div>';
        echo '<div class="g4">';
        echo '<div class="g41">';
        echo '<img src="images/uploads/block.png">';
        echo '<p>'.$value['lg_pieces'].'</p>';
        echo '</div>';
        echo '<div class="g41">';
        echo '<img id="img_enfant" src="images/uploads/enfant.png">';
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
    echo '<div class="arnaque"></div>';
}





//afficher liste pour gérer la bdd
function afficherListe2($mabd) {
    $req = "SELECT * FROM table_saga"; 
try {
$resultat = $mabd->query($req);
} catch (PDOException $e) {
// s'il y a une erreur, on l'affiche
echo '<p>Erreur : ' . $e->getMessage() . '</p>';
die();
}
echo '<table>'."\n";
echo '<thead><tr><th>Photo de la saga</th><th>genre</th><th>photo de la couleur</th><th>modifier</th><th>modifier</th></tr></thead>'."\n";
echo '<tbody>'."\n";
foreach ($resultat as $value) {
echo '<tr>'."\n";
echo '<td><img class="photo" src="../images/uploads/'.$value['sg_nom'].'" width=140px" </td>'."\n";
echo '<td>'.$value['sg_genre'].'</td>'."\n";
echo '<td><img class="photo" src="../images/uploads/'.$value['sg_couleur'].'" width=140px" </td>'."\n";
echo '<td><a href="table2_update_form.php?num='.$value['sg_id'].'">Modifier</a></td>'."\n";
echo '<td><a href="table2_delete.php?num='.$value['sg_id'].'">Supprimer</a></td>'."\n";
echo '</tr>'."\n";
}
echo '</tbody>'."\n";
echo '</table>'."\n";


    // on se déconnexte en mettant la variable de connexion à null 
    $mabd=null;
}



 // fonction d'ajout d'une BD dans la table bande_dessinees
 function ajouterBD2($mabd, $nouvelleImage, $genre, $nouvelleImage2)
 {
     $req = 'INSERT INTO table_saga(sg_nom , sg_genre , sg_couleur) 
     VALUES ( "'.$nouvelleImage.'" ,"'.$genre.'","'.$nouvelleImage2.'")';
     try {
         $resultat = $mabd->query($req);
     } catch (PDOException $e) {
         // s'il y a une erreur, on l'affiche
         echo '<p>Erreur : ' . $e->getMessage() . '</p>';
         die();
     }
     if ($resultat->rowCount() == 1) {
         echo '<p>La saga a été ajoutée au catalogue.</p>' . "\n";
     } else {
         echo '<p>Erreur lors de l\'ajout.</p>' . "\n";
         die();
     }
 }

     // fonction d'effacement d'une BD
     function effacerBD2($mabd, $id) {
        $req = 'DELETE FROM table_saga where sg_id='.$id;
        try{
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount()==1) {
            echo '<p>La bande saga '.$id.' a été supprimée du catalogue.</p>'."\n";
        } else {
            echo '<p>Erreur lors de la suppression.</p>'."\n";
            die();
        }
    }




    // fonction de récupération des informations d'une BD
    function getBD2($mabd, $idsaga) {
        $req = 'SELECT * FROM table_saga where sg_id='.$idsaga;
        try {
            $resultat = $mabd->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        // la fonction retourne le tableau associatif 
        // contenant les champs et leurs valeurs
        return $resultat->fetch();
    }



	// afficher le "bon" auteur parmi les auteurs (prénom et nom)
   // dans les balises "<option>"
   function afficherAuteursOptionsSelectionne2($mabd, $idsaga) {
    $req = "SELECT * FROM table_saga group by sg_genre";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="'.$value['sg_id'].'"';
        if ($value['sg_id']==$idsaga) {
            echo ' selected="selected"';
        }
        echo '>';
        echo $value['sg_genre'];
        echo '</option>'."\n";
    }
}


	// afficher le "bon" auteur parmi les auteurs (prénom et nom)
   // dans les balises "<option>"
   function afficherAuteursOptionsSelectionne3($mabd, $idsaga) {
    $req = "SELECT * FROM table_saga group by sg_couleur";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<option value="'.$value['sg_id'].'"';
        if ($value['sg_id']==$idsaga) {
            echo ' selected="selected"';
        }
        echo '>';
        echo $value['sg_couleur'];
        echo '</option>'."\n";
    }
}


	// fonction de modification d'une BD dans la table bande_dessinees
    function modifierBD2($co, $id, $nouvelleImage, $genre, $nouvelleImage2)
    {
        $req = 'UPDATE table_saga
                SET sg_nom = "'.$nouvelleImage.'",
                    sg_genre = '.$genre.',
                    sg_couleur = "'.$nouvelleImage2.'"
                WHERE sg_id='.$id;
        try {
            $resultat = $co->query($req);
        } catch (PDOException $e) {
            // s'il y a une erreur, on l'affiche
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        if ($resultat->rowCount() == 1) {
            echo '<p>La saga a été modifiée.</p>' . "\n";
        } else {
            echo '<p>Erreur lors de la modification.</p>' . "\n";
            die();
        }
    }
