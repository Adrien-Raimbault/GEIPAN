<?php
// Conditionner l'acces à la page si visiteur sans session initiée
// l'inviter à s'enregister et/ou se connecter ou à simplement saisir son adresse email (création d'une $_SESSION['login] = true  + un compte GUEST)

if(isset($_SESSION['login'])) {
    include 'frmNewObservation.php';
} else {
    echo "<p>Veuillez vous connecter ou renseignez votre adresse mail ci-dessous</p>";
}
