<?php
    require 'requiere/header.php';
    // require 'requiere/navbar.php';
?>
    <div class="ma3">
        <form action="form_recherche.php" data-parsley-validate>
        <p>
            <label  for="duree_mini">prix minimum en euro</label>
            <input type="text" placeholder="50" list="prix" autocomplete="off" id="duree_mini" name="duree_mini" data-parsley-type="number">
        </p> 
        <p>
            <label for="submit"></label>
        <input class="favorite styled" type="submit" value="euhhh">
        </p>
        <div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
</div>
        <datalist id="prix">
            <option value="Allen">
            <option value="Donner">
            <option value="Kubrick">
            <option value="Nolan">
            <option value="Tarantino">
            <option value="Tessari">
        </datalist>
    </div>
<?php
    // require 'requiere/footer.php';
    require 'requiere/fin.php';
?>