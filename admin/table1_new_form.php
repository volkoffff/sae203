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
	        prix (xx.xx) : <input type="number" name="prix" required /><br />
	        pieces : <input type="number" name="pieces" required /><br />
	        genre <select name="genre" required /><br />
            <option value="mixte">mixte</option>
            <option value="homme">homme</option>
            <option value="fille">fille</option>
            </select>
	        âge : <input type="number" name="age" required><br />
	        Photo : <input type="file" name="nouvelleImage" required> <br/>
	        lego saga : <select name="lego_saga">
                <?php  
                $co=connexionBD(); 
                $req = "SELECT * FROM  table_lego ";
                $resultat = $mabd->query($req);
                foreach ($resultat as $value) {
                    echo '<option value="'.$value['_sg_id'].'"> "'.$value['lg_age'].'"</option>';
                }
                <input type="submit" value="ajouter">
                ?>
                </select>
                
	        <?php
	            require '../lib_crud.inc.php';
	            $co=connexionBD();
	            afficherAuteursOptions($co);
	            deconnexionBD($co);
	        ?>
	        </select><br />
	       
	    </form>
	</body>
</html>