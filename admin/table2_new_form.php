<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une saga</h1>
	    <hr />
	    <form action="table2_new_valide.php" method="POST" enctype="multipart/form-data">
			<div class="ee">
				<span>photo de la saga :</span>
			</div>
			<div class="ee">
				<input type="file" name="nouvelleimage" required> <br/>
			</div>
			<div class="ee">	
				<span>genre :</span>
				<input type="text" name="genre"  required /><br />
			</div>
			<div class="ee">
	        	<span>photo de la couleur :</span>
				<input type="file" name="nouvelleimage2" required> <br/>
			</div>
	        <input type="submit" value="Ajouter" />
	    </form>
	</body>
</html>