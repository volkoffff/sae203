<?php
    require 'requiere/header.php';
    require 'requiere/navbar.php';

    $mabd = new PDO('mysql:host=localhost;dbname=sae203;charset=UTF8;', 'sae203', 'Roro2003$2');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM table_lego INNER JOIN table_saga ON table_lego._sg_id = table_saga.sg_id";
    $resultat = $mabd->query($req);
    echo '<div class="ma3">';
    foreach ($resultat as $value) {
        // echo $value['lg_nom'] . ' , ' . $value['lg_prix'] . ' euro ';
        // echo '<br> genre: ' . $value['lg_genre']. '<hr>';

        echo '<div class="carte">';
        echo '<div class="g1">';
        echo '<h4 id="titre_produit">' .$value['lg_nom']. '</h4>';
        echo '</div>';
        echo '<div class="g2">';
        echo '<img class="" src="images/'.$value['sg_couleur'].'">';
        echo '<img class="" src="images/'.$value['lg_image'].'">';
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
?>

<div class="arnaque"></div>
        <!-- <div class="carte">
            <div class="g1">
                <h4 id="titre_produit">AT-AT</h4>
                
            </div>
            <div class="g2">
                <img class="" src="images/75313_Box1_v29.png" alt="">
            </div>
            <div class="g3">
                <img src="images/logo_starwars" alt="">
            </div>
            <div class="g4">
                <div class="g41">
                    <img src="images/block.png" alt="">
                    <p>6785</p>
                </div>
                <div class="g41">
                    <img id="img_enfant" src="images/enfant.png" alt="">
                    <p>+18 ans</p>
                </div>
                <div class="g42">
                    <p id="prix">799.99€</p>
                </div>
            </div>
            <div class="g5">
                    <p>homme </p>
                    <p>science fiction</p>
            </div>
        </div> 
         -->

<?php
    require 'requiere/footer.php';
    require 'requiere/fin.php';
?>