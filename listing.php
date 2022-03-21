<?php
    require 'requiere/header.php';
    require 'requiere/navbar.php';
    require 'lib_crud.inc.php';
   
    $co=connexionBD(); 
    afficherCatalogue($co);   
    deconnexionBD($co);
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