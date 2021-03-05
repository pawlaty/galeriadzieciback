/*zrezygnowa z posts.click i met: OnMyClick przeniecs do ShowBigPost*/
var posts = $(".one_post");
//posts.click(()=> OnMyClick());

//łapiemy duzy obraz
var hidden = $(".review");

    //click dla malego kazdegoposta
function OnMyClick(){
   
  }

//łapie posta i zwraca sciezke
function ShowBigPost(id){
    let path = posts[id -1]["children"][0]["src"]
    console.info(posts[id]);
    console.log(path);

    // $("#big").attr("src",path);
   setTimeout(()=>{$("#big").attr("src",path);},350); 


    if(($(".review").attr("class") === "review review_hide")||
    ($(".review").attr("class") === "review")){
      setTimeout(()=>{Show()},350); 
    }
  else{
    Hide();
    setTimeout(()=>{Show()}, 500);
  }
//} 
console.log(($(".review").attr("class")));







  
}
  //clik dla duzego obrazka onclick w formularzu
function Hide(){
    setTimeout(()=>{ hidden.css("display","none")},500);
    hidden.removeClass("review_show");
    hidden.addClass("review_hide");
    hidden.css("opacity","0"); 
 
}

function Show(){
  hidden.css("display","flex");
  hidden.css("opacity","1");
  hidden.addClass("review_show");
  hidden.removeClass("review_hide");
}