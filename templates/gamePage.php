<!DOCTYPE html>
<?php




if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=login");
	die("");
}


echo "<style>";
echo file_get_contents("css/styleGame.css");
echo "</style>";

include_once("libs/maLibUtils.php");

include_once("libs/modele.php");


// info pour moi 17/05 20:30-21:30 && 22:30-00:00
// 18/05 13:30-15:00  17:00-19:00
// +2h 26/05

?>

<script src="js/pageGameScript.js"></script>






 <img class="right" src="ressources/images/perso/persodoodle.png" alt="doodle perso right to left">
    
<img class="left" src="ressources/images/perso/persodoodle.png" alt="doodle perso right to left">
    <!-----------------------BODY--------------------------------->
<body onload="initGamePage()">
<div id="affichage">
<iframe id="gameiframe" src="templates/gameframe.php"  scrolling="no" ></iframe>
    <input type="button" value="test" onclick="reload()">
</div>

<div id=popupGameDeath>
        <p>Vous etes mort.  Voulez vous recommencer?</p>
        
        <input type="button" value="retry" onclick="reload()">
    </div>

<div id="select">
    <?php

        


        // --------------CHOIX DU TEXTURE PACK------------------------------
        $listTexture = listerTexturePack();
        //tprint($listTexture);

        //echo "<form action=\"texture\" method=\"GET\" >\n";
            //-----------------SELECT---------------------------------------
            ?>
            <select name="choix" id="selectTexture">
                <?php foreach ($listTexture as $texture) { 
            
                    $tableauDeTexture=json_encode($texture);
                    ?>
                    <option value='<?php   echo $tableauDeTexture;?>'
                            <?php   if ($texture["createur"] == "default") {
                            echo '  selected="selected"';
                            }?>
                    >
                        <?php echo $texture["nom"]." - ".$texture["createur"]; ?>
                    </option>
                <?php } ?>
            </select>
    <?php
        //echo "</form>\n";
        // ----------------------------FIN-----------------------------
    ?>
    <input type="button" value="changer de texture" onclick="reload()">
                            
</div>
<form role="form" action="index.php" methode="get">
      <input type="hidden" name="view" value="personalisation_perso">
      <button class="BOUTTONtexture" type="submit" name="action" >Créer un pack de textures</button>
    </form>
</body>
<!--------------------------FIN BODY-------------------------->

