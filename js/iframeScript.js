var  gameW, perso, texture, trueTexture,moveL,moveR,posInf,posSupMax,hightJump, target, elements, listImput, IDrafraicissement,listImputFantome, temp, tempJump;
function initIframe (){
// auteur Raphael

    console.log('initIframe');
    gameW = document.getElementById('gameWindow');
    window.addEventListener('message', function(event) {
        // Vérifiez que l'origine de l'événement est autorisée
        //if (event.origin !== 'https://exemple.com') {
        //    return;
        //}

        // Récupérez les données envoyées vers l'iframe
        texture = event.data;

        
        console.log('Donnees du pack de texture (default == Null) : ', texture);
        verifTexture();
        remplirniv()

        gameW.style.backgroundImage = "url(" + trueTexture["fond"] + ")";
    });
    //envoit a la page parente la confirmation d'inicialisation
    var lienIframe = window.location.href
    window.parent.postMessage("Frame + Page : inicialisation terminer",lienIframe);

}

function endGame() {
    clearInterval(IDrafraicissement); 
    gameW.removeChild(perso);
    
    
    console.log("end Game");
    var lienIframe = window.location.href
    window.parent.postMessage("999:GAMEOVER",lienIframe);


}

function EndVictory() {
    var tempFin =  Date.now();
    gameW.removeChild(perso);
    // console.log('victoire');

    var lienIframe = window.location.href
    window.parent.postMessage("888:"+(tempFin-temp)/1000,lienIframe);
}   



function verifTexture(){
    trueTexture = {};
    //perso
    if (! texture["perso"]) trueTexture["perso"] = "../ressources/images/perso/persodoodle.png";
    else  trueTexture["perso"] = texture["perso"];
    //perso_J
    if (! texture["perso_J"]) trueTexture["perso_J"] = "../ressources/images/perso/persodoodle_J.png";
    else  trueTexture["perso_J"] = texture["perso_J"];    
    //perso_casquette
    if (! texture["perso_casquette"]) trueTexture["perso_casquette"] = "../ressources/images/perso/persodoodle_casquette.png";
    else  trueTexture["perso_casquette"] = texture["perso_casquette"]; 
    //perso_casquette_J
    if (! texture["perso_casquette_J"]) trueTexture["perso_casquette_J"] = "../ressources/images/perso/persodoodle_casquette_J.png";
    else  trueTexture["perso_casquette_J"] = texture["perso_casquette_J"];
    
    //plateforme1
    if (! texture["plateforme1"]) trueTexture["plateforme1"] = "../ressources/images/plateforme/plateforme1.png";
    else  trueTexture["plateforme1"] = texture["plateforme1"];  
    //plateforme2
    if (! texture["plateforme2"]) trueTexture["plateforme2"] = "../ressources/images/plateforme/plateforme2.png";
    else  trueTexture["plateforme2"] = texture["plateforme2"];   
    
    //monstre1
    if (! texture["monstre1"]) trueTexture["monstre1"] = "../ressources/images/monstre/monstre1.png";
    else  trueTexture["monstre1"] = texture["monstre1"];  
    //monstre2
    if (! texture["monstre2"]) trueTexture["monstre2"] = "../ressources/images/monstre/monstre2.png";
    else  trueTexture["monstre2"] = texture["monstre2"];   
    
    //trapoline
    if (! texture["trampoline"]) trueTexture["trampoline"] = "../ressources/images/object/trampoline.png";
    else  trueTexture["trampoline"] = texture["trampoline"]; 
    //bombe
    if (! texture["bombe"]) trueTexture["bombe"] = "../ressources/images/object/bombe.png";
    else  trueTexture["bombe"] = texture["bombe"]; 
    //casquette
    if (! texture["casquette"]) trueTexture["casquette"] = "../ressources/images/object/casquette.png";
    else  trueTexture["casquette"] = texture["casquette"]; 

    //fond
    if (! texture["fond"]) trueTexture["fond"] = "../ressources/images/fond.png";
    else  trueTexture["fond"] = texture["fond"]; 
}

function remplirniv() {
    var niv = getNiv();
    console.log(niv);
    var nbplateform1 = 0;
    var nbplateform2 = 0;
    var nbmonstre1 = 0;
    var nbmonstre2 = 0;
    var nbbombe1 = 0;
    var nbtrampoline1 = 0;
    var nbcasquette1 = 0;
    var holder;

    niv.forEach(element => {
        //console.log(element);
        switch (element.TypeEle) {
            case -1:
                    //console.log("-1");
                break;
            case -2:
                    //console.log("-2");
                    

                    //END 
                    var child = document.createElement('div');

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("END","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("END","GameImgHolder");
                    holder = holder[0];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = 0 + '%';
                    
                    
                    // Création du nœud enfant perso
                    var child = document.createElement('div');
                    child.innerHTML = '<input type="button" value="START" onclick="Start2()">';

                    // Ajout d'un id à l'élément enfant
                    child.id = "StartIMG";
                    
                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);


                break;            
            case 0:
                    //console.log("Perso");
                    // ------------------INICIALISATION DU PERSO-----------------
                    // Création du nœud enfant perso
                        var child = document.createElement('div');
                        child.innerHTML = '<img src="'+ trueTexture["perso"] +'" alt="image perso"/>';

                        // Ajout d'un id à l'élément enfant
                        child.id = "perso";

                        // Ajout du nœud enfant au nœud parent
                        gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    perso = document.getElementById("perso");
                    perso.style.bottom = ((element.Ypos)*10) + '%';
                    perso.style.left = ((element.Xpos)*10) + '%';
                    posInf = (element.Ypos)*10;
                    posSupMax = (element.Ypos)*10;
                    //-------

                break;
            case 1:
                    //console.log("plateforme1");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["plateforme1"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                  
                    child.classList.add ("plateforme1","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("plateforme1");
                    holder = holder[nbplateform1];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbplateform1++;
                    //-------------
                break;
            case 2:
                    //console.log("plateforme2");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["plateforme2"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("plateforme2","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("plateforme2");
                    holder = holder[nbplateform2];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbplateform2++;
                    //-------------
                break;
            case 3:
                    //console.log("monstre1");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["monstre1"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("monstre1","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("monstre1");
                    holder = holder[nbmonstre1];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbmonstre1++;
                    //-------------
                break;
            case 4:
                    //console.log("monstre2");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["monstre2"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("monstre2","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("monstre2");
                    holder = holder[nbmonstre2];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbmonstre2++;
                    //-------------
                break;
            case 5:
                    //console.log("bombe");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["bombe"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("bombe","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("bombe");
                    holder = holder[nbbombe1];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbbombe1++;
                    //-------------
                break;
            case 6:
                    //console.log("casquette");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["casquette"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("casquette","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("casquette");
                    holder = holder[nbcasquette1];    
                    holder.style.bottom =  ((element.Ypos)*10) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbcasquette1++;
                    //-------------
                break;
            case 7:
                    //console.log("trampoline");
                    // Création du nœud enfant platefome1
                    var child = document.createElement('div');
                    child.innerHTML = '<img src="'+ trueTexture["trampoline"] +'" alt="image platefome1"/>';

                    // Ajout d'un id à l'élément enfant
                    child.classList.add ("trampoline","GameImgHolder") ; 

                    // Ajout du nœud enfant au nœud parent
                    gameW.appendChild(child);   
                    //-------------
                    // Création des variables
                    holder = document.getElementsByClassName("trampoline");
                    holder = holder[nbtrampoline1];    
                    holder.style.bottom =  ((element.Ypos)*10-5) + '%';
                    holder.style.left = ((element.Xpos)*10) + '%';
                    nbtrampoline1++;
                    //-------------
                break;
                
            default:
                console.log("err");
                break;
        }
    });




}
    
function Start2 (){
    var imgStart = document.getElementById("StartIMG");
    imgStart.style.display = "none"
    console.log("Bonton Start apuiller - Début du jeu");
    hightJump = 0;
    var persoRect = perso.getBoundingClientRect();
    posInf = persoRect.bottom;
    posSupMax = persoRect.bottom;
    listImput = [];
    temp = Date.now();
    tempJump = 0;
    // console.log(temp);

    IDrafraicissement =  setInterval(rafraichissement, 10);//fréquence de rafraichissemnt du jeu

    document.addEventListener("DOMContentLoaded", function () {
        
    });

}

function deplacementKeyDown(event){

    //console.log("test key down");
    //console.log("test");
    //console.log(event);
    if (event.key == "ArrowRight") {
        moveR = true;
    }
    if (event.key == "ArrowLeft") {
        moveL = true;
    }
}

function deplacementKeyUp(event){
    //console.log("test key up");
    if (event.key == "ArrowRight") {
        moveR = false;
    }
    if (event.key == "ArrowLeft") {
        moveL = false;
    }
}





function rafraichissement(){
    var gameWRect = gameW.getBoundingClientRect();
    var unPourcent = window.innerHeight * 0.002;
    var persoRect = perso.getBoundingClientRect();
    var dateNow = Date.now();
    elements = document.querySelectorAll('.GameImgHolder');//touts les éléments de la page


    //-----------------------------------COLISION--------------------------------------------
    elements.forEach(element => {
        

        if (element.classList[0]=="END") {//Rebon sur la plateforme
            elementRect = element.getBoundingClientRect();
            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top)
                && (persoRect.top < elementRect.bottom )
                ) {
                    EndVictory();
            }
        }


        if (element.classList[0]=="plateforme1") {//Rebon sur la plateforme
            elementRect = element.getBoundingClientRect();
            // console.log(element);

            // console.log(persoRect.left < elementRect.right);
            // console.log(persoRect.right > elementRect.left);
            // console.log(persoRect.bottom > elementRect.top-2);
            // console.log(persoRect.bottom < elementRect.top+2);
            // console.log(persoRect.top < elementRect.bottom + element.clientHeight);



            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top-2)
                && (persoRect.bottom < elementRect.top+2)
                && (persoRect.top < elementRect.bottom + element.clientHeight)
                ) {
                    console.log("plateforme1");
                    if (dateNow - tempJump > 500){
                        tempJump = dateNow;
                        hightJump = persoRect.bottom;
                        posInf = persoRect.bottom;
                        console.log(hightJump);
                     }      
            }
        }
        if (element.classList[0]=="plateforme2") {//destruction de la plateforme
            elementRect = element.getBoundingClientRect();
            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top-2)
                && (persoRect.bottom < elementRect.top+2)
                && (persoRect.top < elementRect.bottom + element.clientHeight)
                ) {
                    gameW.removeChild(element);

            }
        }
        if (element.classList[0]=="monstre1" || element.classList[0]=="monstre2" ) {//fin de la partie
            elementRect = element.getBoundingClientRect();
            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top)
                && (persoRect.top < elementRect.bottom )
                ) {
                    endGame();
                    
            }
        }
        if (element.classList[0]=="bombe") {//fin de la partie
            elementRect = element.getBoundingClientRect();
            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top)
                && (persoRect.top < elementRect.bottom )
                ) {
                    elements.forEach(element => {
                        if (element.classList[0]=="monstre1" || element.classList[0]=="monstre2" ) {
                            gameW.removeChild(element);
                        }

                    });
                    
            }

        }
        if (element.classList[0]=="trampoline") {//trampoline
            elementRect = element.getBoundingClientRect();
            if ((persoRect.right > elementRect.left) 
                && (persoRect.left < elementRect.right)
                && (persoRect.bottom > elementRect.top-2)
                && (persoRect.bottom < elementRect.top+2)
                && (persoRect.top < elementRect.bottom + element.clientHeight)
                ) {
                    console.log("trampoline");
                    if (dateNow - tempJump > 500){
                        tempJump = dateNow;
                        hightJump = persoRect.bottom ;
                        posInf = persoRect.bottom - (0.2 * window.innerHeight);
                        console.log(hightJump);
                     }   
            }
        }
        
            
    });
    //------------------------------------FIN COLISION-------------------------------------

    // -------------------------------------DEPLACEMENT PERSO-------------------------------

    var isOverflowingR = persoRect.right > gameWRect.right ;
    var isOverflowingL =  persoRect.left < gameWRect.left;
    

        if (moveR && !isOverflowingR) {

            // listImput.push("r");
            var pos = getComputedStyle(perso);// on récupère toutes les données CSS de perso
                    
                pos = pos['left'];// on récupère la donné qui nous interrese
                pos = parseFloat(pos);// on enlève le px
                pos += 4*unPourcent;
                perso.style.setProperty('left', pos );// on déplace le perso
            }
        else if (moveL && !isOverflowingL) {

            // listImput.push("l");
            var pos = getComputedStyle(perso);// on récupère toutes les données CSS de perso
                pos = pos['left'];// on récupère la donné qui nous interrese
                pos = parseFloat(pos);// on enlève le px
                pos -= 4*unPourcent ;
                perso.style.setProperty('left', pos );// on déplace le perso
         }
            
        //  else listImput.push("n");

    
    //  ------------ SAUT ------------------
    // un saut fait 20% de hauteur de la page
    if (hightJump > (posInf - (0.2 * window.innerHeight))) {
        // listImput.push("u");
        var pos = getComputedStyle(perso);// on récupère toutes les données CSS de perso
                pos = pos['bottom'];// on récupère la donné qui nous interrese
                pos = parseFloat(pos);// on enlève le px
                pos = pos + 3*unPourcent ;
                perso.style.setProperty('bottom', pos );// on déplace le perso

                hightJump = persoRect.bottom;
                if (persoRect.bottom > posSupMax) {
                    posSupMax = persoRect.bottom;
                }

                //-----------DEPLACMENT ELEMENTS--------------
                 elements.forEach(element => {
                     var H = element.getBoundingClientRect();
                         H = H['top'];
                         if (H > window.innerHeight) {
                            gameW.removeChild(element);
                         }
                         else {
                            H = parseFloat(H);// on enlève le px
                            H = H + 2*unPourcent ;
                            element.style.setProperty('top', H );// on déplace le perso
                        }
                 });

                
                
        
    }
    else {
        // listImput.push("d");
        var pos = getComputedStyle(perso);// on récupère toutes les données CSS de perso
                pos = pos['bottom'];// on récupère la donné qui nous interrese
                pos = parseFloat(pos);// on enlève le px
                pos = pos - 3*unPourcent ;
                perso.style.setProperty('bottom', pos );// on déplace le perso


                var isOverflowing = persoRect.bottom > gameWRect.bottom;

                if (isOverflowing) {
                    endGame();
                }
    }
    
    //------------------------------------FIN DEPLACEMENT PERSO----------------------------


    // -----------------------DEPLACEMENT FANTOME------------------------




    


}

