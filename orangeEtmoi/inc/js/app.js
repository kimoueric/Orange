const zoneDeSaisie = document.querySelector("#message");
const validateNumber = document.querySelector(".first");
const validateText = document.querySelector(".two");
const numero = document.querySelector("#two");
const compteurMessage = document.querySelector(".compteur-message") ;
const envoyer = document.querySelector("#envoyer");


const regex = new RegExp(/^(01|05|07)[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}$/) ;


numero.addEventListener('input' , (e)=>{
    
    
    let temp = numero.value ;

    verification = temp.match(regex) ;

    if (verification) {
        validateNumber.classList.add("active") ;
        
    }
    else{
        validateNumber.classList.remove("active") ;
        
    }
    change()
})

zoneDeSaisie.addEventListener('input' , (e)=>{

    compteurMessage.textContent = 150 - parseInt(zoneDeSaisie.value.length); 
    
    if(zoneDeSaisie.value.length >= 3){

        validateText.classList.add("active")
    }
    else{

        validateText.classList.remove("active")
    }
    
    change()
})

function change(){
    if(validateNumber.className == "first active" && validateText.className == "two active"){

        envoyer.type = "submit";
        envoyer.style.color = "white" ;
        envoyer.style.backgroundColor = "black" ;
    }
    else{
        envoyer.type = "text";
        envoyer.style.color = "black" ;
        envoyer.style.backgroundColor = "rgba(255, 227, 204, 0.589)" ;
    }
}


