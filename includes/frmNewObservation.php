<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li><label for="obsDateTime">Date et heure de l'événement : </label><input type="datetime-local" id="obsDateTime" name="obsDateTime" value="<?php echo $obsDateTime;?>" /></li>
        <li><label for="obsDuration">Durée de l'événement (minutes) : </label><input type="number" min="1" id="obsDuration" name="obsDuration" value="<?php echo $obsDuration;?>" /></li>
        <li><label for="obsLocation">Localisation de l'événement</label>
        <select name="obsLocation" id="obsLocation">
            <?php
                $conn = new Query;
                $resultat = $conn->select('states');
                $c = count($resultat);

                if($c > 0){
                    $html = "";
                    for($i = 0 ; $i <= $c; $i ++){
                        $html.= '<option value="';
                        $html.= $resultat[$i]->id_state;
                        $html.='">';
                        $html.= $resultat[$i]->stateLabel;
                        $html.='</option>';
                    }
                    echo $html;
                }
            ?>
        </select></li>
        <li><label for="obsCardinalPoint">Localisation de l'événement</label><select name="obsCardinalPoint" id="obsCardinalPoint">
            <option value="N">Nord</option>
            <option value="NE">Nord-Est</option>
            <option value="NO">Nord-Ouest</option>
            <option value="S">Sud</option>
            <option value="SE">Sud-Est</option>
            <option value="SO">Sud-Ouest</option>
            <option value="E">Est</option>
            <option value="O">Ouest</option>
        </select></li>
        <li><label for="obsWeather">Conditions nuageuses</label><select name="obsWeather" id="obsWeather">
            <option value="0">0 - Ciel dégagé</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4 - Ciel à moitié couvert</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8 - Ciel Couvert</option>
            <option value="9">9 - Ciel obscurci par obstruction</option>
        </select></li>
        <li><label for="obsDescritpion">Descriptif de l'observation</label><textarea name="obsDescritpion" id="obsDescritpion"></textarea></li>
        <li><label for="obsPic">Photo (optionnel): </label><input type="file" id="obsPic" name="obsPic" /></li>
        <li><input type="reset" value="Effacer" /><input type="submit" value="Soumettre" name="validate" /></li>
    </ul>
</form>


    
