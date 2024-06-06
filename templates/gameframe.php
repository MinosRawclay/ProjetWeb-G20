

<?php




echo "<style>";
//include_once("../CSS/styleGame.css");
echo file_get_contents("../css/styleGame.css");
echo "</style>";
include_once("../libs/modele.php");
?>



<?php
//TO DO : faire un objet js qui repertorie les chemins de tout les éléments utils : fait
//echo "Test";


//TO DO : faire un objet js qui repertorie tout les ligne d'un niveau dans un tableau




?>




<!--Nous somme dans la page du jeu -->


<script>
    function getNiv(){
        console.log("test");
        return JSON.parse ('<?php  $nomniv = $_REQUEST["nomniv"];
        echo json_encode (listerNiveau($nomniv));   ?>');
    }
</script>
<script src="../js/iframeScript.js?v=<?php echo time(); ?>"></script>


<!-----------------------------------BODY------------------------------------>
<body onload="initIframe()" onkeydown="deplacementKeyDown(event)" onkeyup="deplacementKeyUp(event)">

  


    <div id="gameWindow" >



    
        
        <!--ICI est l'emplacemnt des images du perso ex: <img src="../images/default/default/perso/persodoodle.png" alt="">-->
    

    </div>



</body>
