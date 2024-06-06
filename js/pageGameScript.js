 
 
 
 

var iframe, iframeW, listTexture, lien, texture, DivPageGame;

function initGamePage(){
    console.log("InitGamePage");
    lien = window.location.href ;

    // Selectionnez l'iframe par son ID
    iframe = document.getElementById('gameiframe');

    // Accedez à la fenêtre (window) de l'iframe
    iframeW = iframe.contentWindow;

    texture = JSON.parse ( document.getElementById("selectTexture").value);

        window.addEventListener('message', function(event) {
        // Verifiez que l'origine de l'evenement est autorisee
        //if (event.origin !== 'https://exemple.com') {
        //    return;
        //}

        // Recuperez les donnees envoyees depuis l'iframe
        var donnees = event.data;
        var code = donnees.split(':');
            // console.log("test1:");
            // console.log(code[0]);
            

            //  console.log(donnees);
            if (code[0]==999) {
                console.log('defaite');
                var popup  = document.getElementById("popupGameDeath")
                popup.style.display="flex";
            }
            else if (code[0]==888){
                console.log('Victoire');
                var popup  = document.getElementById("popupGameVictory");
                var pPopopGV = document.getElementById("pPopopGV");
                popup.style.display="flex";
                pPopopGV.innerHTML="Victoire ! Vous aver fini le niveau en :"+ code[1] +"s Voulez vous l'enregister?";
                var inputH = document.getElementById("inputH");
                inputH.value = code[1];
                reload()
            }
            else {

            // Faites quelque chose avec les donnees recuperees
            console.log('Donnees reçues de l\'iframe : ', donnees);
            iframe.contentWindow.postMessage(texture, lien );

            
            //-----------On genère les elements manquant dans la page--------------------
            //on est oblige d'attendre que les messages ait fini, je ne sais pas pourquoi
            DivPageGame = document.getElementById("affichage");
            
            
            if (! texture["perso"]) { //  !(null) => Vrai donc si perso null alors :
                var imagePerso = "ressources/images/perso/persodoodle.png";     
            }
            else var imagePerso = texture["perso"];
            //Image gauche
            // Creer l'element image
            var img = document.createElement('img');

            // Definir les attributs de l'image
            img.src = imagePerso;
            img.className = 'left';

            // Ajouter l'image à la div
            DivPageGame.appendChild(img);
            
            //Image droite

            // Creer l'element image
            img = document.createElement('img');
            // Definir les attributs de l'image
            img.src = imagePerso;
            img.className = 'right';
        
            // Ajouter l'image à la div
            DivPageGame.appendChild(img);
        }
        });
}

function DivStyleNono() {
    var popup = document.getElementById("popupGameVictory");
    popup.style.display="none";
}



async function delayMess() {
     await new Promise(resolve => setTimeout(resolve, 2000));
    // Code à executer après 2 secondes
        // Envoi de nouvelles informations à l'iframe
        var nouvellesInformations = {
            message: 'Nouvelles informations envoyees depuis la page parent'
        };
        iframe.contentWindow.postMessage(nouvellesInformations, lien );
}


function reload()
{
    // console.log("reset");
    iframeW.location.reload();    
    var popup  = document.getElementById("popupGameDeath")
    popup.style.display="none";
}

    