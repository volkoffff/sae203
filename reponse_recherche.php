<h1>Nos albums</h1>
<p>Résultats de votre recherche</p>
<hr />
<?php
    require 'lib_crud.inc.php';
    $co=connexionBD();
    afficherResultatRecherche($co);
    deconnexionBD($co);
?>