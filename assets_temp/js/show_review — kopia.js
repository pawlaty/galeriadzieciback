//ustawiamy clicka dla postów
$(".one_post").click(()=>OnMyClick($(this)));

//łapiemy duzy obraz
var hidden = $(".review");

//łapiemy wszystkei posty do tablicy 
var postes = document.getElementsByClassName('one_post');

//ustawiamy addListener dla kzadaego
for(let i= 0; i<postes.lenght; i++){
        postes[i].addEventListener('click', ()=>OnMyClick());
    }


    //click dla malego kazdegoposta
function OnMyClick(){
 
    hidden.css("display","flex");
    hidden.css("opacity","1");
    hidden.addClass("review_show");
    hidden.removeClass("review_hide");
  }

  //clik dla duzego obrazka
function Hide(){
    setTimeout(()=>{ hidden.css("display","none")},500);
    hidden.removeClass("review_show");
    hidden.addClass("review_hide");
    hidden.css("opacity","0"); 
 
}




