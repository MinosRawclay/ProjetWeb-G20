var dragged;



/* Les événements sont déclenchés sur les objets glissables */
document.addEventListener("drag", function (event) {}, false);

document.addEventListener(
   "dragstart",
   function (event) {
   // Stocke une référence sur l'objet glissable
   dragged = event.target;
   // transparence 50%
   // event.target.style.opacity = "";
   //DataTransfer.dropEffect = copy;
   console.log(event.target.parentNode);
   console.log(event.target);
   console.log(dragged);
   }
);


function actualiserLignes(){
    var nbLignes = document.getElementById("nbarea");

    var iframe = document.getElementById('editoriframe');
            // Vérifier si l'iframe est chargée
            if (iframe.contentWindow && iframe.contentWindow.actualiserLignesFrame) {
                // Appeler la fonction définie dans l'iframe
                iframe.contentWindow.actualiserLignesFrame(nbLignes.value);
            } 

}