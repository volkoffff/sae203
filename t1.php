<?php
    if ( (empty($_POST['email'])) || (empty($_POST['mdp'])) ){
        header('Location: form1.php');
    }
    $email_verif=htmlentities($_POST['email']);
    if (filter_var($email_verif, FILTER_VALIDATE_EMAIL)) {
        echo '<p>'.$_POST['email'].'</p>'."\n";
        // echo '<p>'.$_POST['mdp'].'</p>'."\n";
      } else {
        header('Location: form1.php');
      }
