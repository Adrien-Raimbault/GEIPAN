<form action="index.php?page=inscription" method="post" enctype="multipart/form-data">
    <ul>
        <li><label for="userName">Nom : </label><input type="text" id="userName" name="userName" value="<?php echo $userName;?>" /></li>
        <li><label for="userFirstname">Prénom : </label><input type="text" id="userFirstname" name="userFirstname"  value="<?php echo $userFirstname;?>" /></li>
        <li><label for="userMail">E-mail : </label><input type="text" id="userMail" name="userMail"  value="<?php echo $userMail;?>" /></li>
        <li><label for="userPassword">Mot de passe : </label><input type="password" id="userPassword" name="userPassword" /></li>
        <li><label for="userPasswordV">Vérification mot de passe : </label><input type="password" id="userPasswordV" name="userPasswordV" /></li>
        <li><label for="userAvatar">Avatar (optionnel): </label><input type="file" id="userAvatar" name="userAvatar" /></li>
        <li><input type="reset" value="Effacer" /><input type="submit" value="S'inscrire" name="inscription" /></li>
    </ul>
</form>
