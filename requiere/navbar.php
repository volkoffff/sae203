<nav class="navbar">
          <div class="container">
              <div class="row justify-content-between">
                  <div class="logo"><a href="index.php">LEGO<span>SET</span></a></div>
                  <div class="links">
                  <ul class="menu">
                      <li class="nav-item"><a href="index.php" class="nav-link active">Home <span></span></a></li>
                      <li class="nav-item"><a href="listing.php" class="nav-link">catalogue <span></span></a></li>
                      <li class="nav-item"><a href="form_recherche.php" class="nav-link">recherche <span></span></a></li>
                      <li class="nav-item"><a href="admin/admin.php" class="nav-link">privé <span></span></a></li>
                      <li class="nav-item"><a href="#" class="nav-link">
                            <div class="search-box">
                                <button class="btn-search">
                                <i class="fas fa-search"></i></button>
                                <form class="scb" action="reponse_recherche.php" method="POST">
                                <input type="search" name="nom" id="real" class="input-search" list="boite" placeholder="Type to Search...">
                                <datalist id="boite">
                    <?php
                    // On va afficher ici la datalist
                    require 'lib_crud.inc.php';
                    $co=connexionBD();
                    genererDatalistAuteurs($co);
                    deconnexionBD($co);
                    ?>
                </datalist>
                                </form>
                            </div>
                        </a></li>

                  </ul>
                  </div>
                  <div class="menu-btn">
                      <i class="fas fa-bars"></i>
                  </div>
              </div>
          </div>
</nav>