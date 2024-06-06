






<div class="ograListeNiv">
    <p>Liste des niveaux</p>
    <?php
         
        $listeniv = getALLniv();
        ///print_r($listeniv);
        $pseudo = valider("pseudo","SESSION");
        foreach ($listeniv as $element) {
            if ($element["NomAuteur"] == $pseudo || $element["publique"]==1) {
                echo '<form action="index.php" method="get">';
                echo '<input type="hidden" name="view" value="gamePage">';
                echo '<input type="hidden" name="nomniv" value="'.$element["Nom"].'">';
                echo '<input class="btnChoixNiv" type="submit" value="'.$element["Nom"].'">';
                echo '</form>';
            }
        }



    ?>
</div>