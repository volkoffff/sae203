<footer>
    <div class="footer-content">
        <h3>LEGO SET</h3>
        <p>Merci de nous faire confience lors de l'achat de vos produits</p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
        </ul>
        <?php
                $nb=trim(file_get_contents('comptage/mon_compteur.txt'));
                $nb++;
                echo $nb. ' visiteurs sur notre site.'. "\n";
                file_put_contents('comptage/mon_compteur.txt',$nb, LOCK_EX);
        ?>
    </div>
</footer>