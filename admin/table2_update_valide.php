<!DOCTYPE html>
<html>
	<head>
		<title>SAE203</title>
	</head>
	<body style="font-family:sans-serif;">
	    <a href="../index.php">Accueil</a> | <a href="table1_gestion.php">Gestion</a>
	    <hr />
	    <h1>Modifier la saga</h1>
	    <hr />
	    <?php
	        require '../lib_crud.inc.php';
	
            $id=$_POST['num'];
            $genre=$_POST['genre'];
	        var_dump($_POST);
	        var_dump($_FILES);
	
	        $imageType=$_FILES["nouvelleimage"]["type"];
	        if ( ($imageType != "image/png") &&
	            ($imageType != "image/jpg") &&
	            ($imageType != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }
	
	        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["nouvelleimage"]["name"];
	
	        if(is_uploaded_file($_FILES["nouvelleimage"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["nouvelleimage"]["tmp_name"], "../images/uploads/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
            $imageType2=$_FILES["nouvelleimage2"]["type"];
	        if ( ($imageType2 != "image/png") &&
	            ($imageType2 != "image/jpg") &&
	            ($imageType2 != "image/jpeg") ) {
	                echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
	                echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
	                die();
	        }
	
	        $nouvelleImage2 = date("Y_m_d_H_i_s")."---".$_FILES["nouvelleimage2"]["name"];
	
	        if(is_uploaded_file($_FILES["nouvelleimage2"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["nouvelleimage2"]["tmp_name"], 
	            "../images/uploads/".$nouvelleImage2)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
	        }
	
	        $co=connexionBD();
	        modifierBD2($co, $id, $nouvelleImage, $genre, $nouvelleImage2);
	        deconnexionBD($co);
	    ?>
	</body>
</html>