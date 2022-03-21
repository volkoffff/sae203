<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une bande dessinée</h1>
	    <hr />
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        nom : <input type="text" name="nom" required /><br />
	        prix (xx.xx) : <input type="number" name="prix" min="0" required /><br />
	        pieces : <input type="number" name="pieces" min="0" required /><br />
	        genre <select name="genre" required /><br />
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions2($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        âge : <input type="number" min="0" name="age" required><br />
	        Photo : <input type="file" name="nouvelleimage" required> <br/>
	        logo de la licence lego : <select name="legosaga">        
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>