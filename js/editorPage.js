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
//    console.log(event.target.parentNode);
//    console.log(event.target);
//    console.log(dragged);
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


function exportPage() {
    var listeElement = [];
    var idElement = 0;
    var iframe = document.getElementById('editoriframe');
     //console.log(iframe.contentWindow.document.getElementById("grille"));
    var grille = iframe.contentWindow.document.getElementById("grille");
    var nbLignes = document.getElementById("nbarea");
    var flag =0;
    var falgEnd =0;
    //console.log(grille.childElementCount);

    var pseudo = getPerso();
    var nomniv = document.getElementById("NomNiveau");
    nomniv = nomniv.value;
    console.log(nomniv);
    if (nomniv.length != 0) {
        var obj;

        var listniv = getListNiv();
        var flag3;

        console.log(listniv);

        listniv.forEach(element => {
            if (element.Nom == nomniv) {
                flag3 = 1;
                console.log("err");
            }
        });

        obj = {
            nom : nomniv,
            nomAuteur : pseudo
        }

        listeElement.push(obj);

        if (grille.childElementCount!=0 && !flag3) {
            for (let i = grille.childElementCount-1; i > -1 ; i--) {
                // console.log("test");
                j=0;
                for (let j = 0; j < 10; j++) {
                    var child = grille.children[i].children[j].firstChild;
                    console.log(child);
                    if (child != undefined) {
                        
                        console.log(child.alt);
                        switch (child.alt) {
                            case 'perso':
                                    flag ++;
                                    if (flag==1) {
                                        obj = {
                                            idElement : idElement,
                                            TypeEle : 0,
                                            Xpos : j,
                                            Ypos : grille.childElementCount-i
                                        }   
                                    }
                                    else {
                                        obj = {
                                            idElement : idElement,
                                            TypeEle : -3,
                                            Xpos : j,
                                            Ypos : grille.childElementCount-i

                                        } 
                                    }
                                    
                                break;
                            case 'plateforme1':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 1,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break;
                            case 'plateforme2':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 2,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break;    
                        

                            case 'monstre1':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 3,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break;
                            case 'monstre2':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 4,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break; 


                            case 'bombe':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 5,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break;
                            case 'trampoline':
                                    obj = {
                                        idElement : idElement,
                                        TypeEle : 7,
                                        Xpos : j,
                                        Ypos : grille.childElementCount-i

                                    }
                                break; 

                            case 'end':
                                    falgEnd++;
                                    if (falgEnd==1) {
                                        obj = {
                                            idElement : idElement,
                                            TypeEle : -2,
                                            Xpos : 9,
                                            Ypos : grille.childElementCount-i

                                        }
                                    }
                                    else {
                                        obj = {
                                            idElement : idElement,
                                            TypeEle : -3,
                                            Xpos : j,
                                            Ypos : grille.childElementCount-i

                                        }
                                    }
                                    
                                break;     

                            default:
                                obj = {
                                    idElement : idElement,
                                    TypeEle : -3,
                                    Xpos : j,
                                    Ypos : grille.childElementCount-i

                                }
                                break;
                        } 
                    
                        listeElement.push(obj);
                        idElement ++;
                    }
                }
                
            }
            if (falgEnd==0) {  
                
                obj = { 
                    idElement : idElement,
                    TypeEle : -2,
                    Xpos : 9,
                    Ypos : listeElement[listeElement.length-1].Ypos +1
                }
                listeElement.push(obj);
            }
            console.log(listeElement);

        

        var holderText = document.getElementById("inputText");

        holderText.value = JSON.stringify(listeElement);
        var submitText = document.getElementById("submitText");
        submitText.submit();
        }
    
    }
    // if (iframe.contentWindow && iframe.contentWindow.myFunction) {
    //     // Appeler la fonction définie dans l'iframe
    //     iframe.contentWindow.exportFrame();
    // }
}    