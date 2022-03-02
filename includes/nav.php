<header>
    <nav role="navigation">
        <ul>
            <li><a href="index.php?page=home">Accueil</a></li>
            <li><a href="index.php?page=newObservation">Ajouter une observation</a></li>
            <?php
            if(isset($_SESSION['login']) && $_SESSION['login'] === true){
                echo "<li><a href=\"index.php?page=logout\">Se déconnecter</a></li>";
                echo "<li><a href=\"index.php?page=account\">Mon compte</a></li>";
            } else {
                echo "<li><a href=\"index.php?page=login\">Se connecter</a></li>";
                echo "<li><a href=\"index.php?page=inscription\">S'inscrire</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>