let passwordicon = document.querySelector("#passwordicon")


passwordicon.addEventListener("click", (e) => {

    if (e.target.parentElement.previousElementSibling.type == "password") {
        e.target.className = "fa-solid fa-eye"
        e.target.parentElement.previousElementSibling.type = "text"
    }

    else if (e.target.parentElement.previousElementSibling.type == "text") {
        e.target.className = "fa-solid fa-eye-slash"
        e.target.parentElement.previousElementSibling.type = "password"



    }

})


let EmailId =  document.querySelector("#emailId")
let Password = document.querySelector("#password")

let form = document.querySelector("form")
let alertMessage = document.querySelector(".text-2")
form.addEventListener("submit",(e)=>{
    // e.preventDefault()

    let emailVal = EmailId.value.trim();
    let PasswordVal = Password.value.trim()

    if(emailVal === ""){
        seterror(alertMessage,"Email feild required")
    }
    else if(PasswordVal === ""){
        seterror(alertMessage,"password feild required")
    }
    else{
        console.log("all okay");
    }
    if(emailVal === "" && PasswordVal === ""){
        seterror(alertMessage,"All feild required")
    }
})

function seterror(element,message){
    element.innerText = message;
    toastNotification();
}

//toast notfication completed      
toast = document.querySelector(".toast")
closeIcon = document.querySelector(".close"),
progress = document.querySelector(".progress");

let timer1, timer2;

function toastNotification(){
    toast.classList.add("active");
    progress.classList.add("active");

    timer1 = setTimeout(() => {
        toast.classList.remove("active");
    }, 5000);

    timer2 = setTimeout(() => {
      progress.classList.remove("active");
    }, 5300);
}

closeIcon.addEventListener("click", () => {
    toast.classList.remove("active");
    
    setTimeout(() => {
      progress.classList.remove("active");
    }, 300);

    clearTimeout(timer1);
    clearTimeout(timer2);
  });