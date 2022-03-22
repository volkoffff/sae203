<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="admin.php">Gestion</a>
	    <hr />
	    <h1>supprimer une boite de légo</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
	        $id=$_GEt['num'];
	
	        $co=connexionBD();
	        effacerBD($co, $id);
	        deconnexionBD($co);
	    ?>
	</body>
</html>