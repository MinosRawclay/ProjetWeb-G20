

<?php 
echo "<style>";
//include_once("../CSS/styleGame.css");
echo file_get_contents("css/styleEditor.css");
echo "</style>";
?>

<script>
  function getListNiv(){
    return JSON.parse ('<?php echo json_encode( getListNiv($_SESSION["pseudo"])); 
          ?>');
  }

  function getPerso (){
    return "<?php echo $_SESSION["pseudo"]; ?>";

  }

</script>





<div id="bandeauG">
  <div class="listElement">
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/perso/persodoodle.png" alt="perso">
    </div>
    <!--PLATEFORMES-->
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/plateforme/plateforme1.png" alt="plateforme1">
    </div>
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/plateforme/plateforme2.png" alt="plateforme2">
    </div>
    <!--MONSTRES-->
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/monstre/monstre1.png" alt="monstre1">
    </div>
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/monstre/monstre2.png" alt="monstre2">
    </div>
    <!--OBJECTS-->
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/object/bombe.png" alt="bombe">
    </div>
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/object/trampoline.png" alt="trampoline">
    </div>
    <div
      class="draggable"
      draggable="true"
      ondragstart="event.dataTransfer.setData('text/plain',null)">
      <img src="ressources/images/object/end.png" alt="end">
    </div>


  </div>





  <div class="bouttonEdition">
    <p>nombre de ligne (taille du niveau)</p>
    <input type="number" name="nblignes" id="nbarea" min="5" max="200" value="60">
    <input type="button" value="actualise" onclick="actualiserLignes()">
  </div>
  <input type="button" value="Exporter" onclick="exportPage()">
  <input type="text" maxlength="20" placeholder="nom du niveau" id="NomNiveau">

</div>
<form action="controleur.php" method="get" id="submitText">
<input type="hidden" name="texte" id="inputText" value="">
<input type="hidden" name="action" id="inputText" value="nouveauNiveau">
</form>
<div id="bandeauD">


</div>




<iframe id="editoriframe" src="templates/editorframe.php"  scrolling="yes" ></iframe>

<script src="js/editorPage.js?v=<?php echo time(); ?>"></script>