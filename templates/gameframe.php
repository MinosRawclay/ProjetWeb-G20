

<?php
echo "<style>";
include_once("../CSS/styleGame.css");
echo "</style>";
?>

<?php
//TO DO : faire un objet js qui repertorie les chemins de tout les éléments utils
//echo "Test";


//TO DO : faire un objet js qui repertorie tout les ligne d'un niveau dans un tableau
?>





<!--Nous somme dans la page du jeu -->


<script>
    var positionPerso, gameW, perso, inicialise, texture, trueTexture,donnees;

function initIframe (){

    console.log('initIframe');

    window.addEventListener('message', function(event) {
    // Vérifiez que l'origine de l'événement est autorisée
    //if (event.origin !== 'https://exemple.com') {
    //    return;
    //}

    // Récupérez les données envoyées vers l'iframe
    texture = event.data;

    
    console.log('Données reçues dans l\'iframe : ', texture);
    verifTexture();
});
    //envoit a la page parente la confirmation d'inicialisation
    lienIframe = window.location.href
    window.parent.postMessage("message : inicialisation terminer",lienIframe);

}

function verifTexture(){
    trueTexture = {};
    //perso
    if (! texture["perso"]) trueTexture["perso"] = "../images/perso/persodoodle.png";
    else  trueTexture["perso"] = texture["perso"];
    //perso_J
    if (! texture["perso_J"]) trueTexture["perso_J"] = "../images/perso/persodoodle_J.png";
    else  trueTexture["perso_J"] = texture["perso_J"];    
    //perso_casquette
    if (! texture["perso_casquette"]) trueTexture["perso_casquette"] = "../images/perso/persodoodle_casquette.png";
    else  trueTexture["perso_casquette"] = texture["perso_casquette"]; 
    //perso_casquette_J
    if (! texture["perso_casquette_J"]) trueTexture["perso_casquette_J"] = "../images/perso/persodoodle_casquette_J.png";
    else  trueTexture["perso_casquette_J"] = texture["perso_casquette_J"];
    
    //plateforme1
    if (! texture["plateforme1"]) trueTexture["plateforme1"] = "../images/plateforme/plateforme1.png";
    else  trueTexture["plateforme1"] = texture["plateforme1"];  
    //plateforme2
    if (! texture["plateforme2"]) trueTexture["plateforme2"] = "../images/plateforme/plateforme2.png";
    else  trueTexture["plateforme2"] = texture["plateforme2"];   
    
    //monstre1
    if (! texture["monstre1"]) trueTexture["monstre1"] = "../images/monstre/monstre1.png";
    else  trueTexture["monstre1"] = texture["monstre1"];  
    //monstre2
    if (! texture["monstre2"]) trueTexture["monstre2"] = "../images/monstre/monstre2.png";
    else  trueTexture["monstre2"] = texture["monstre2"];       
}

    
function Start2 (){

    




    if (inicialise) {
        return 0;
    }
    
    var gameW = document.getElementById('gameWindow');

    console.log("test3");
    console.log(gameW);
    //console.log(gameW);


// ------------------INICIALISATION DU PERSO-----------------
    // Création du nœud enfant perso
        var child = document.createElement('div');
        child.textContent = "";

        // Ajout d'une classe à l'élément enfant
        child.id = "perso";

        // Ajout du nœud enfant au nœud parent
        gameW.appendChild(child);
    //-------------
    // Création des variables
    
    perso = document.getElementById("perso");
    //console.log(perso);
    perso.style.bottom = "-50%";
    positionPerso = {
        Up : 0,
        Right : 0,
    }; 
    //-------------

    inicialise = 1;
}

</script>


<!-----------------------------------BODY------------------------------------>
<body onload="initIframe()">
    <div id="gameWindow" onclick="Start2()">



    <div class="perso">
        
        <!--ICI est l'emplacemnt des images du perso ex: <img src="../images/default/default/perso/persodoodle.png" alt="">-->
    </div>

    </div>



</body>
