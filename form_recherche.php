<?php
    require 'requiere/header.php';
    require 'requiere/navbar.php';
?>
<div class="img_hero">
    <div class="clarecherche">
    <h1>Recherchez le légo de vos rève parmis notre liste :</h1>    
        <form class="scb" action="reponse_recherche.php" method="POST">
            <input type="search" name="nom" id="real" list="boite" />
                <datalist id="boite">
                    <?php
                    // On va afficher ici la datalist
                    require 'lib_crud.inc.php';
                    $co=connexionBD();
                    genererDatalistAuteurs($co);
                    deconnexionBD($co);
                    ?>
                </datalist>
            <input type="submit" value="chercher !" />
        </form>
    </div>
</div>




<!-- </datalist>
    <div class="ma4">
        <form action="form_recherche.php" class="ma5" method="GET" data-parsley-validate>
            <label class="qform" for="saga">Choisissez une cathégorie:</label>
                <select type="text" class="care" autocomplete="off" id="saga" name="saga">
                    <option value="<8">tous</option>
                    <option value="Star Wars">Star Wars</option>
                    <option value="Brickhead">Brickhead</option>
                    <option value="Ideas">Ideas</option>
                    <option value="Creator">Creator</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Technic">Technic</option>
                </select>
        <form action="form_recherche.php" method="GET" data-parsley-validate>
            <label class="qform" for="age">Age:</label>
                <select type="text" class="care" list="age" autocomplete="off" id="age" name="age">
                    <option value="<8">tous</option>
                    <option value="<8">moins de 8 ans</option>
                    <option value="<10">moins de 10 ans</option>
                    <option value="<12">moins de 12 ans</option>
                    <option value="<16">moins de 16 ans</option>
                    <option value="<18">moins de 18 ans</option>
                    <option value="<18">plus de 18 ans</option>
                </select>
        <form action="form_recherche.php" method="GET" data-parsley-validate>
            <label class="qform" for="age">Nombre de pièces:</label>
                <select class="care" type="text" list="age" autocomplete="off" id="age" name="age">
                    <option value="<8">tous</option>
                    <option value="<8">entre 0 et 500 pièces</option>
                    <option value="<10">entre 500 et 1000 pièces</option>
                    <option value="<12">entre 1000 et 2000 pièces</option>
                    <option value="<16">entre 2000 et 400 pièces</option>
                    <option value="<18">plus de 4000 pièces</option>
                </select>
                <input type="submit" href="reponse_recherche.php" class="envoyer" value="chercher">
        </form>        
    </div>
</div> -->
<?php
    require 'requiere/footer.php';
    require 'requiere/fin.php';
?>