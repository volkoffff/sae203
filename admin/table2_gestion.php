<?php
    require '../requiere/header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SAE203</title>
    </head>
    <body>
        <a href="../index.php">Accueil</a>
        <hr />
        <div class="tktclehaut">
        <h1>Gestion des données</h1>

        <p><a href="table2_new_form.php">Ajouter une saga</a></p>
        </div>
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe2($co);
            deconnexionBD($co);
        ?>
    </body>
</html>