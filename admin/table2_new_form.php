<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une saga</h1>
	    <hr />
	    <form action="table1_new_valide.php" method="POST" enctype="multipart/form-data">
	        photo de la saga : <input type="file" name="nouvelleimage" required> <br/>
	        genre : <input type="number" name="prix" min="0"  required /><br />
	        photo de la couleur : <input type="file" name="nouvelleimage" required> <br/>
	        logo de la licence lego : <select name="legosaga">        
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co,);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>