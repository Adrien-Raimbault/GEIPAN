<h1>Inscription</h1>
<?php

if (isset($_POST['inscription'])) {
    $userName = htmlentities(mb_strtoupper(trim($_POST['userName']))) ?? '';
    $userFirstname = htmlentities(ucfirst(mb_strtolower(trim($_POST['userFirstname'])))) ?? '';
    $userMail = trim(mb_strtolower($_POST['userMail'])) ?? '';
    $userPassword = htmlentities(trim($_POST['userPassword'])) ?? '';
    $userPasswordV = htmlentities(trim($_POST['userPasswordV'])) ?? '';

    $error = array();

    if (preg_match('/(*UTF8)^[[:alpha:]]+$/', html_entity_decode($userName)) !== 1)
        array_push($error, "Veuillez saisir votre nom");
    else
        $userName = html_entity_decode($userName);

    if (preg_match('/(*UTF8)^[[:alpha:]]+$/', html_entity_decode($userFirstname)) !== 1)
        array_push($error, "Veuillez saisir votre prénom");
    else
        $userFirstname = html_entity_decode($userFirstname);

    if (!filter_var($userMail, FILTER_VALIDATE_EMAIL))
        array_push($error, "Veuillez saisir un e-mail valide");

    if (strlen($userPassword) === 0)
        array_push($error, "Veuillez saisir un mot de passe");

    if (strlen($userPasswordV) === 0)
        array_push($error, "Veuillez saisir la vérification de votre mot de passe");

    if ($userPassword !== $userPasswordV)
        array_push($erreur, "Vos mots de passe ne correspondent pas");

    if (isset($_FILES['userAvatar']) && $_FILES['userAvatar']['error'] == 0) {
        $fileName = $_FILES['userAvatar']['name'];
        $fileType = $_FILES['userAvatar']['type'];
        $fileTmpName = $_FILES['userAvatar']['tmp_name'];
        
        $tableauTypes = array("image/jpeg", "image/jpg", "image/png", "image/gif");

        if (in_array($fileType, $tableauTypes)) {
            $path = getcwd() . "/avatars/";
            $date = date('Ymdhis');
            $fileName = $date . $fileName;
            $fileNameFinal = $path . $fileName;
            $fileNameFinal = str_replace("\\", "/", $fileNameFinal);

            $moveFile = true;
        }
        else {
            array_push($erreur, "Erreur type MIME");
        }
    } else if ($_FILES['userAvatar']['error'] == 4){
            $path = getcwd() . "/avatars/";
            $fileName = 'avatar_default.png';
            $fileNameFinal = $path . $fileName;
            $fileNameFinal = str_replace("\\", "/", $fileNameFinal);
            $moveFile = false;
    } else {
        $fileUploadError = $_FILES['userAvatar']['error'];
        switch($fileUploadError) {
            case 1 :
                $fileUploadErrorMessage = "La taille du fichier téléchargé excède la valeur de upload_max_filesize.";
            break;
            case 2 :
                $fileUploadErrorMessage = "La taille du fichier téléchargé excède la valeur de MAX_FILE_SIZE, qui a été spécifiée dans le formulaire HTML.";
            break;
            case 3 :
                $fileUploadErrorMessage = "Le fichier n'a été que partiellement téléchargé.";
            break;
            case 6 :
                $fileUploadErrorMessage = "Un dossier temporaire est manquant.";
            break;
            case 7 :
                $fileUploadErrorMessage = "Échec de l'écriture du fichier sur le disque.";
            break;
            case 8 :
                $fileUploadErrorMessage = "Une extension PHP a arrêté l'envoi de fichier.";
            break;
        }

        array_push($error, "Erreur upload : " . $fileUploadErrorMessage);
    }

    if (count($error) === 0) {

        try {
            $conn = new Query();
            $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            
            $requete = $conn->connexion->prepare("SELECT * FROM users WHERE userMail='$userMail'");
            $requete->execute();
            $resultat = $requete->fetchAll(PDO::FETCH_OBJ);
           
            if(count($resultat) !== 0) {
                echo "<p>Votre adresse est déjà enregistrée dans la base de données</p>";
            }

            else {
                $query = $conn->connexion->prepare("
                INSERT INTO users(userName, userFirstname, userMail, userPassword, userAvatar, id_role)
                VALUES (:name, :firstname, :email, :password, :avatar, :role)
                ");
                $userRole= 1;
                $query->bindParam(':name', $userName, PDO::PARAM_STR_CHAR);
                $query->bindParam(':firstname', $userFirstname, PDO::PARAM_STR_CHAR);
                $query->bindParam(':email', $userMail, PDO::PARAM_STR_CHAR);
                $query->bindParam(':password', $userPassword, PDO::PARAM_STR_CHAR);
                $query->bindParam(':avatar', $fileNameFinal, PDO::PARAM_STR_CHAR);
                $query->bindParam(':role', $userRole);
                $query->execute();

                if($moveFile) move_uploaded_file($fileTmpName, $path . $fileName);
                
                echo "<p>Insertions effectuées</p>";
            }
        } catch (PDOException $e) {
            die("Erreur :  " . $e->getMessage());
        }

        $conn = null;
    } else {
        $messageErreur = "<ul>";
        $i = 0;
        do {
            $messageErreur .= "<li>" . $error[$i] . "</li>";
            $i++;
        } while ($i < count($error));

        $messageErreur .= "</ul>";

        echo $messageErreur;
        include 'frmInscription.php';
    }
} else {
    echo "<h2>Merci de renseigner le formulaire&nbsp;:</h2>";
    $userName = $userFirstname = $userMail = '';
    include 'frmInscription.php';
}
