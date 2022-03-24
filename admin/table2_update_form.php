<!DOCTYPE html>
<html>
<head>
	<title>SAE203</title>
    <link rel="stylesheet" href="../style.css">
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
        $saga=getBD2($co, $id);
        
        deconnexionBD($co);
    ?>
	    <form action="table2_update_valide.php" class="orgmod" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="num" value="<?php echo $id; ?>" />
            <div class="ee">
                <span>logo de la licence lego :</span> 
                <input type="file" name="nouvelleimage" required> <br/>      
            </div>
            <div class="ee">
                <span>genre :</span> 
                <select type="text" name="genre"  required /><br />
                    <?php
                        $co=connexionBD();
	                    afficherAuteursOptionsSelectionne2($co, $saga['sg_id']);
	                    deconnexionBD($co);
                    ?>
                </select></br >
            </div>
            <div class="ee">
                <span>photo de la couleur :</span> 
                <input type="file" name="nouvelleimage2" required> <br/>
            </div>

        <input type="submit" class="btvvalid" value="Modifier" />
    </form>
</body>
</html> 