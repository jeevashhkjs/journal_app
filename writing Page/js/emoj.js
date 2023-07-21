// header section
// let darkBtn = document.querySelector(".darkMode")
// let headerItems = document.querySelectorAll(".headItem")

// darkBtn.addEventListener("click",()=>{
//     document.body.classList.toggle("dark-theme")
// })

// let actv = document.querySelector("#activeListBtn");
// actv.classList.add("showBtn")

// headerItems.forEach(getSideItemBtns => {
//     getSideItemBtns.addEventListener("click",(e)=>{
//         headerItems.forEach(getBtns=>{
//             getBtns.classList.remove("activeBtn")
//         })
//         e.target.classList.add("activeBtn")
//     })
// });

// search function

let searchEle = document.querySelector(".searchInput")
let searchIcon = document.querySelector(".searchIcon")

searchEle.addEventListener("keyup",()=>{
    if(searchEle.value){
        searchIcon.style.display = "none"
    }else{
        searchIcon.style.display = "block"
    }
})

//calender 
let calender = document.querySelector(".calenBtn")
calender.value = new Date().toISOString().substring(0, 10)

//emojs

emojslet  = document.querySelectorAll(".emoj");

emojslet.forEach(emojsBtn => {
    emojsBtn.addEventListener("mouseover",()=>{
        emojslet.forEach(element => {
            emojsBtn.previousElementSibling.style.visibility = "visible"
            element.classList.add("blur")
            element.style.opacity = 0.4
        });
        emojsBtn.style.opacity = 1
    })
    emojsBtn.addEventListener("mouseout",()=>{
        emojslet.forEach(element => {
            emojsBtn.previousElementSibling.style.visibility = "visible"
            element.classList.remove("blur")
            emojsBtn.previousElementSibling.style.visibility = "hidden"
            element.style.opacity = 1
        }); 
    })
});
