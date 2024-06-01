

<?php 
echo "<style>";
//include_once("../CSS/styleGame.css");
echo file_get_contents("../css/styleEditor.css");
echo "</style>";
?>




<div id="bandeauG">
<div
    class="draggable"
    draggable="true"
    ondragstart="event.dataTransfer.setData('text/plain',null)">
    This div is draggable
  </div>

  <div>
    <p>nombre de ligne (taille du niveau)</p>
    <input type="number" name="nblignes" id="nbarea" min="5" max="200" value="60">
    <input type="button" value="actualise" onclick="actualiserLignes()">
</div>


</div>

<div id="bandeauD">


</div>




<iframe id="editoriframe" src="editorframe.php"  scrolling="yes" ></iframe>

<script src="../js/editorPage.js?v=<?php echo time(); ?>"></script>