<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
</head>
<body style="font-family:sans-serif;">
    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	<hr>
    <h1>Modifier une bande dessinée</h1>
    <hr />
    <?php
        require '../lib_crud.inc.php';

        $id=$_GET['num'];
        $co=connexionBD();
        $boite=getBD($co, $id);
        var_dump($boite);
        deconnexionBD($co);
    ?>
	    <form action="table2_update_valide.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="num" value="<?php echo $id; ?>" />
            logo de la licence lego : <select name="legosaga">        
	            <?php
	                $co=connexionBD();
	                afficherAuteursOptionsSelectionne($co, $boite['_sg_id']);
	                deconnexionBD($co);
	            ?>
            </select><br />
	        genre : <select type="text" name="genre"  required /><br />
            <?php
                $co=connexionBD();
	            afficherAuteursOptionsSelectionne2($co, $boite['_sg_id']);
	            deconnexionBD($co);
            ?>
            </select></br >
	        photo de la couleur : <input type="file" name="nouvelleimage2" required> <br/>

        <input type="submit" value="Modifier" />
    </form>
</body>
</html> 