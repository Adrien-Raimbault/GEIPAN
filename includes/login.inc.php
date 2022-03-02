<h1>Login</h1>
<?php
if (isset($_POST['validate'])) {
    $mail = htmlentities(trim($_POST['mail'])) ?? '';
    $password = htmlentities(trim($_POST['password'])) ?? '';

    $erreur = array();

    if (strlen($mail) === 0)
        array_push($erreur, "Veuillez saisir votre nom");

    if (strlen($password) === 0)
        array_push($erreur, "Veuillez saisir un mot de passe");

    if (count($erreur) === 0) {
        

        try{
            $conn= new Query();

            if(count($conn->select("users","userMail","$mail")) == 0) {
                echo "Le nom d'utilisateur et/ou le mot de passe sont incorrects";
            }
            else {
                $resultat = $conn->select("users","userMail","$mail");
                $mdpRequete = $resultat[0]->userPassword;
                if(password_verify($password, $mdpRequete)) {
                    if(!isset($_SESSION['login'])) {
                        $_SESSION['login'] = true;
                        $_SESSION['role'] = $resultat[0]->id_role;
                        $_SESSION['nom'] = $resultat[0]->userName;
                        $_SESSION['prenom'] = $resultat[0]->userFirstname;
                        echo "<script>
                        document.location.replace('http://localhost:8888/GEIPAN/index.php?page=home');
                        </script>";
                    }
                    else {
                        echo "<p>Vous êtes déjà connecté, donc vous navez rien à faire ici";
                    }
                }
                else {
                    echo "Le nom d'utilisateur et/ou le mot de passe sont incorrects";
                }
            }
                
        }
        catch(PDOException $e){
            die("Erreur :  " . $e->getMessage());
        }   

        $conn = null;
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>";
            $messageErreur .= $erreur[$i];
            $messageErreur .= "</li>";
            $i++;
        } while ($i < count($erreur));

        $messageErreur .= "</ul>";

        echo $messageErreur;
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $mail = '';
}

include 'frmLogin.php';