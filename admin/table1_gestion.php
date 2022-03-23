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

        <p><a href="table1_new_form.php">Ajouter une bande dessinée</a></p>
        </div>
        <?php
            require '../lib_crud.inc.php';
            $co=connexionBD();
            afficherListe($co);
            deconnexionBD($co);
        ?>
    </body>
</html>