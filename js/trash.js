/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


let trashLists = document.querySelector(".all-cards")
let searchEle = document.querySelector(".searchInput")
let searchIcon = document.querySelector(".searchIcon")

searchEle.addEventListener("keyup",()=>{
    if(searchEle.value){
        searchIcon.style.display = "none"
    }else{
        searchIcon.style.display = "block"
    }
})



let trashData = [];
    $( window ).ready(function() {
    
        $.ajax({
          url: '/deletedDatas',
          method: 'GET',
          success: function (response) {
            let obj = JSON.parse(response)
          
            obj.forEach(element => {
               if(element.delete_at){
                trashData.push(element);
               }
              });
                listOfTrashData(trashData)
          }
      })

      })


      function listOfTrashData(trashList) {
       if(trashList.length > 0){
       let datas= trashList.map((element)=>
       `<div class="cards-item">
       <div class="data">
           <p class="title">${element.title}</p>
           <p class="content">${element.content}</p>
       </div>
       <div class="item-footer">
           <div class="end-date">
               <p class="footerDate"><span>30 days left</span><span>M</span></p>
           </div>
           <div class="actions">
               <i class="fa-solid fa-trash-can permanentDelete" id=${element.id}></i>
               <i class="fa-solid fa-clock-rotate-left particularRestore" id=${element.id}></i>
           </div>
       </div>
   </div>`).join("")
          trashLists.innerHTML = datas
       }
       else{
        trashLists.innerHTML = `<div class='container-fluid'>
          <div class='emptyLogo contents'>
              <a href='/'><img src='./images/nodata.jpeg' class='mtyLogo emptyImg'></a>
          </div>
          <div class='quote'>
              <p class='quoteText'>
              </p>
          </div>
          </div>`
       }


          $(".permanentDelete").click(function (e) {

            let deletedid = e.target.id;
            permanentDelete(deletedid)
            

          });

          $(".particularRestore").click(function (e) {

            let restoreId = e.target.id;
            restore(restoreId)
            

          });
          
      }

      function restore(id) {
        $.ajax({
            url: '/restore',
            method: 'POST',
            data:{"id":id},
            success: function (response) {
            let obj = JSON.parse(response)
            trashData = [];
                obj.forEach(element => {
                    trashData.push(element)
                   });
                 listOfTrashData(trashData)
            }
        })
      }

      function permanentDelete(deletedId) {
        
        $.ajax({
            url: '/PermanentDelete',
            method: 'POST',
            data:{"id":deletedId},
            success: function (response) {
                
              let objs = JSON.parse(response)

              trashData = [];
              objs.forEach(element => {
                if(element.delete_at){
                    trashData.push(element);
                }
               });
     
                 listOfTrashData(trashData)
        
            }
        })


    }