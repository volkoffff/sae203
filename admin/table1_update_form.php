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
        $album=getBD($co, $id);
        var_dump($album);
        deconnexionBD($co);
    ?>
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        nom : <input type="text" name="nom" required /><br />
	        prix (xx.xx) : <input type="number" name="prix" min="0"  required /><br />
	        pieces : <input type="number" name="pieces" min="0" required /><br />
	        genre <select name="genre" required /><br />
            <option value="mixte">mixte</option>
            <option value="homme">homme</option>
            <option value="fille">fille</option>
            </select>
	        âge : <input type="number" name="age" min="0" required><br />
	        Photo : <input type="file" name="nouvelleimage" required> <br/>
	        logo de la licence lego : <select name="legosaga">        
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co, $album['_auteur_id']);
	            deconnexionBD($co);
	        ?>
        </select><br />
        <input type="submit" value="Modifier" />
    </form>
</body>
</html>