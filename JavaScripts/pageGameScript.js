 
 
 
 

var iframe, iframeW, listTexture, lien, texture, DivPageGame;

    function initGamePage(){
        console.log("InitGamePage");
        lien = window.location.href ;

        // Sélectionnez l'iframe par son ID
        iframe = document.getElementById('gameiframe');

        // Accédez à la fenêtre (window) de l'iframe
        iframeW = iframe.contentWindow;

        texture = JSON.parse ( document.getElementById("selectTexture").value);

            window.addEventListener('message', function(event) {
            // Vérifiez que l'origine de l'événement est autorisée
            //if (event.origin !== 'https://exemple.com') {
            //    return;
            //}

            // Récupérez les données envoyées depuis l'iframe
            var données = event.data;

            // Faites quelque chose avec les données récupérées
            console.log('Données reçues de l\'iframe : ', données);
            iframe.contentWindow.postMessage(texture, lien );

            
            //-----------On génère les éléments manquant dans la page--------------------
            //on est obligé d'attendre que les messages ait fini, je ne sais pas pourquoi
            DivPageGame = document.getElementById("affichage");
            
            
            if (! texture["perso"]) { //  !(null) => Vrai donc si perso null alors :
                var imagePerso = "../images/perso/persodoodle.png";
                
            }
            else var imagePerso = texture["perso"];
            //Image gauche
            // Créer l'élément image
            var img = document.createElement('img');

            // Définir les attributs de l'image
            img.src = imagePerso;
            img.className = 'left';

            // Ajouter l'image à la div
            DivPageGame.appendChild(img);
            
            //Image droite

            // Créer l'élément image
            img = document.createElement('img');
            // Définir les attributs de l'image
            img.src = imagePerso;
            img.className = 'right';
        
            // Ajouter l'image à la div
            DivPageGame.appendChild(img);




            });



        


    }




    async function delayMess() {
         await new Promise(resolve => setTimeout(resolve, 2000));
        // Code à exécuter après 2 secondes
            // Envoi de nouvelles informations à l'iframe
            var nouvellesInformations = {
                message: 'Nouvelles informations envoyées depuis la page parent'
            };
            iframe.contentWindow.postMessage(nouvellesInformations, lien );
    }


    function reload()
    {
        console.log("reset");
        iframeW.location.reload();       
    }

