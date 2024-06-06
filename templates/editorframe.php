

<?php 
echo "<style>";
//include_once("../CSS/styleGame.css");
echo file_get_contents("../css/styleEditor.css");
echo "</style>";



// <div class="dropzone" >
//     <div
//         class="draggable"
//         draggable="true"
//         ondragstart="event.dataTransfer.setData('text/plain',null)" 
//         >
//         This div is draggable2
//     </div>
// </div>
// <div class="dropzone"></div>
// <div class="dropzone"></div>
// <div class="dropzone"></div>



?>




<script src="../js/editorframe.js?v=<?php echo time(); ?>"></script>

<body onload="InitEditFrame()">
<div id="grille">



</div>

<div id="trashCan" class="dropzone"></div>

</body>





<style>
 
</style>


