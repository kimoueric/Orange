const validateNumber = document.querySelector(".validateNumber");
const validateMdp = document.querySelector(".validateMdp");
const revalidateMdp = document.querySelector(".revalidateMdp");

const enterNumber = document.querySelector(".enterNumber")
const enterMdp = document.querySelector(".enterMdp")
const confirmMdp = document.querySelector(".confirmMdp")
const inscrire = document.querySelector("#inscrire");



const regex = new RegExp(/^(01|05|07)[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}[\.\-]?[0-9]{2}$/) ;


enterNumber.addEventListener('input' , (e)=>{
    
    
    let temp = enterNumber.value ;

    verification = temp.match(regex) ;

    if (verification) {
        validateNumber.classList.add("active") ;
        
    }
    else{
        validateNumber.classList.remove("active") ;
        
    }
    change() ;
})

enterMdp.addEventListener('input' , (e)=>{
    
    
    let temp = enterMdp.value.length ;;

    if (temp > 7) {
        validateMdp.classList.add("active") ;
        
    }
    else{
        validateMdp.classList.remove("active") ;
        
        
    }
    directVerif();
    change();
})

confirmMdp.addEventListener('input' , (e)=>{
    
    
    let temp1 = enterMdp.value.length ;

    if ((temp1) && (enterMdp.value == confirmMdp.value)) {
        
        revalidateMdp.classList.add("active") ;
         
    }
    else{
        revalidateMdp.classList.remove("active") ;
    }
    directVerif();
    change() ;
})

function change(){
    if(validateNumber.className == "validateNumber active" && validateMdp.className == "validateMdp active" && revalidateMdp.className == "revalidateMdp active"){

        inscrire.type = "submit";
        inscrire.style.color = "white" ;
        inscrire.style.backgroundColor = "black" ;
    }
    else{
        inscrire.type = "text";
        inscrire.style.color = "black" ;
        inscrire.style.backgroundColor = "rgba(255, 227, 204, 0.589)" ;
    
    }
}

function directVerif(){
    
    if((enterMdp.value == confirmMdp.value || confirmMdp.value==enterMdp.value) &&(enterMdp.value.length > 7))
    {
        revalidateMdp.classList.add("active");
    }
    else
    {
        revalidateMdp.classList.remove("active");

    }
}


