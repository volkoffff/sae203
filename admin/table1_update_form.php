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
	    <form action="table1_update_valide.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="num" value="<?php echo $id; ?>" />
	        nom : <input type="text" name="nom" value="<?php echo $boite['lg_nom']; ?>" required /><br />
	        prix : <input type="number" name="prix" value="<?php echo $boite['lg_prix']; ?>" min="0"  required /><br />
	        pieces : <input type="number" name="pieces" value="<?php echo $boite['lg_pieces']; ?>" min="0" required /><br />
	        genre :<select name="genre"  ?>" required /><br />
            <option value="<?php echo $boite['lg_genre'];?>"> garder le meme genre : <?php echo $boite['lg_genre']; ?> </option>
            <option value="mixte">mixte</option>
            <option value="homme">homme</option>
            <option value="fille">fille</option>
            </select>
	        âge : <input type="number" name="age" value="<?php echo $boite['lg_age']; ?>" min="0" required><br />
	        Photo : <input type="file" name="nouvelleimage" required> <br/>
	        logo de la licence lego : <select name="legosaga">        
	        <?php
	            $co=connexionBD();
	            afficherAuteursOptionsSelectionne($co, $boite['_sg_id']);
	            deconnexionBD($co);
	        ?>
        </select><br />
        <input type="submit" value="Modifier" />
    </form>
</body>
</html>