<?php
dump($_POST);

if(isset($_SESSION['login'])) {
    include 'frmNewObservation.php';
} else {
    echo "<p>Veuillez vous connecter ou renseignez votre adresse mail ci-dessous</p>";
}
