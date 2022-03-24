<!DOCTYPE html>
<html>
	<head>
	    <title>SAE203</title>
		<link rel="stylesheet" href="../style.css">
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>Ajouter une boite de lego</h1>
	    <hr />
	    <form action="table1_new_valide.php" class="orgmod" method="POST" enctype="multipart/form-data">
			<div class="ee">
	        	<span>nom :</span> 
				<input type="text" name="nom" required /><br />
			</div>
			<div class="ee">
	        	<span>prix :</span> 
				<input type="number" name="prix" min="0"  required /><br />
			</div>
			<div class="ee">
				<span>pieces :</span> 
				<input type="number" name="pieces" min="0" required /><br />
			</div>
			<div class="ee">
				<span>genre :</genre>	
					<select name="genre" required /><br />
						<option value="mixte">mixte</option>
						<option value="homme">homme</option>
						<option value="fille">fille</option>
            		</select>
			</div>
			<div class="ee">
				<span>âge :</span> <input type="number" name="age" min="0" required><br />
			</div>
			<div class="ee">
				<span>Photo :</span> <input type="file" name="nouvelleimage" required> <br/>
			</div>
			<div class="ee">
				<span>logo de la licence lego :</span> 
					<select name="legosaga">        
						<?php
	           			require '../lib_crud.inc.php';
	            		$co=connexionBD();
	            		afficherAuteursOptions($co,);
	            		deconnexionBD($co);
					?>
	        		</select>
					<br />
			</div>
	        	<input type="submit" value="Ajouter" />
			
	    </form>
			
	</body>
</html>