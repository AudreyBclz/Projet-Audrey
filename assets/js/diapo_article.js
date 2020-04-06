var i=2;

function affiche() {


    if (i==4){
        i=1;
    }
    else {document.getElementById("diapo").src="../../assets/img/articles/article"+i+".jpg";
    i=i+1;}

};
(function diapos (){
    setInterval(affiche,7000);
    }());
