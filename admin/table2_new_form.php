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
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
	        photo de la saga : <input type="file" name="nouvelleimage" required> <br/>
	        genre : <input type="text" name="genre"  required /><br />
	        photo de la couleur : <input type="file" name="nouvelleimage2" required> <br/>
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>