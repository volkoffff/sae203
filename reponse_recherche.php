<?php
    require 'requiere/header.php';
    require 'requiere/navbar.php';
?>
<h1>Nos albums</h1>
<p>Résultats de votre recherche</p>
<hr />
<?php
    require 'lib_crud.inc.php';
    $co=connexionBD();
    afficherResultatRecherche($co);
    deconnexionBD($co);
?>
<?php
    require 'requiere/footer.php';
    require 'requiere/fin.php';
?>