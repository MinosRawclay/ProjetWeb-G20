var dragged;


    function actualiserLignesFrame(nbLignes) {

        console.log(nbLignes);

        var grille = document.getElementById("grille");
        
        console.log(grille.childElementCount);

        if (grille.childElementCount > nbLignes) {// il faut enlever des lignes
            console.log('il faut enlever des lignes');
            let val = grille.childElementCount - nbLignes
            for (let index = 0; index < val; index++) {
                grille.removeChild(grille.firstChild);
            }
        } else {//il faut ajouter des lignes
            console.log("il faut ajouter des lignes");
            let val = nbLignes - grille.childElementCount
            for (let index = 0; index < val  ; index++) {
                let ligne = document.createElement('div');
                ligne.className = "ligne"
                for (let i = 0; i < 10; i++) {
                    let holder = document.createElement('div');
                    holder.className = "dropzone";
                    ligne.appendChild(holder);
                }
                console.log(ligne);
                grille.prepend(ligne);  
            }
        }
    }



    function InitEditFrame() {

        actualiserLignesFrame(60)


         /* Les événements sont déclenchés sur les objets glissables */
        document.addEventListener("drag", function (event) {}, false);

        document.addEventListener(
            "dragstart",
            function (event) {
            // Stocke une référence sur l'objet glissable
            dragged = event.target;
            // transparence 50%
            event.target.style.opacity = 0.5;
            }
        );

        document.addEventListener(
            "dragend",
            function (event) {
            // reset de la transparence
            event.target.style.opacity = "";
            }
        );

        /* Les événements sont déclenchés sur les cibles du drop */
        document.addEventListener(
            "dragover",
            function (event) {
            // Empêche default d'autoriser le drop
            event.preventDefault();
            }
        );

        document.addEventListener(
            "dragenter",
            function (event) {
            // Met en surbrillance la cible de drop potentielle lorsque l'élément glissable y entre
            if (event.target.className == "dropzone") {
                event.target.style.background = "purple";
            }
            }
        );

        document.addEventListener(
            "dragleave",
            function (event) {
            /* reset de l'arrière-plan des potentielles cible du drop lorsque les éléments glissables les quittent */
            if (event.target.className == "dropzone") {
                event.target.style.background = "";
            }
            }
        );

        document.addEventListener(
            "drop",
            function (event) {
            // Empêche l'action par défaut (ouvrir comme lien pour certains éléments)
            event.preventDefault();
            // Déplace l'élément traîné vers la cible du drop sélectionnée
            if (event.target.className == "dropzone" && event.target.childElementCount == 0) {

                event.target.style.background = "";
                // console.log(dragged);
                // console.log("Drop");
                // console.log(dragged);

                

                
                
                if (dragged  == undefined) {// si l'élement drag est dans la page parent on le récupère et on le duplique
                    dragged = window.parent.dragged;
                    // console.log(dragged);
                    var drag = dragged.cloneNode(true);
                    // drag.innerHTML = "cool";
                    // var drag2 = dragged.cloneNode(true);
                    // console.log(drag);
                    
                    dragged.parentNode.appendChild(drag);
                    event.target.prepend(dragged);
                    // dragged.parentNode.removeChild(dragged);

                }
                else {

                
                // console.log(drag);
                dragged.style.opacity = "";
                event.target.prepend(dragged);
                
                }
                dragged = undefined;
            }
            else {
                event.target.style.background = "";
            }
            }
        );
    }

 