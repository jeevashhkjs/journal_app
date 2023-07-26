/*!
* Start Bootstrap - Simple Sidebar v6.0.6 (https://startbootstrap.com/template/simple-sidebar)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
*/
// 
// Scripts
// 
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

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


let userContents = document.querySelector(".cards")

let responseData = [];
let deletedData = [];
$( window ).ready(function() {
    
    $.ajax({
      url: '/getdata',
      method: 'GET',
      success: function (response) {
        // console.log(response)
        let obj = JSON.parse(response)
        

        obj.forEach(element => {
           if(!element.delete_at){
              responseData.push(element);
           }
          });

            listOfData(responseData)
         
      }
  })
  })


  function listOfData(list) {
 if(list.length > 0){
    let datas = list.map((element,index)=>{
   
        if(index == 0)
        {
          return `<div class="cards-div">
          <a href="/writing"><img class="cards-img" src="./images/write.svg" alt=""></a>
          <h2>Add new journal</h2>
      </div> 
      <div class="cards-div">
     <h3 class="cards-journalname">${element.title}</h2>
      <p class="cards-journal">${element.content}</p>
      <p class="card-text">${String.fromCodePoint("0x"+element.emoji)}</p>
      <div class="cards-footer">
          <div class="date">
              <p class="cards-date"> <span class="from-date">may 15</span> -><span class="to-date">may 20</span></p>
          </div>
          <div class="nav">
              <button class="starred"></button>
              <button class="delete"><i class="fa-regular fa-trash-can deleted" id=${element.id}></i></button>
              <button class="edit"><i class="fa-solid fa-pencil"></i></button>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa-solid fa-share" id=${element.id}></i></button>

          </div>
      </div>
  </div>`
}
        else{
          return `<div class="cards-div">
     <h3 class="cards-journalname">${element.title}</h2>
      <p class="cards-journal">${element.content}</p>
      <p class="card-text">${String.fromCodePoint("0x"+element.emoji)}</p>
      <div class="cards-footer">
          <div class="date">
              <p class="cards-date"> <span class="from-date">may 15</span> -><span class="to-date">may 20</span></p>
          </div>
          <div class="nav">
              <button class="starred"></button>
              <button class="delete"><i class="fa-regular fa-trash-can deleted" id=${element.id}></i></button>
              <button class="edit"><i class="fa-solid fa-pencil"></i></button>
              <button class="share"><i class="fa-solid fa-share" id=${element.id}></i></button>
          </div>
      </div>
  </div>`}

      }).join("")
      userContents.innerHTML = datas
      click(list)
    }
    else{
      userContents.innerHTML =  `<div class='container-fluid'>
          <div class='emptyLogo contents'>
              <a href='/writing'><img src='./images/animation_500_lhxnxy5b 1.svg' class='mtyLogo emptyImg'></a>
          </div>
          <div class='quote'>
              <p class='quoteText'>
                  No journals were found , please click the above icon and<br>
          get start writing your journals
              </p>
          </div>
          </div>`
        }
    }

  function starred(id) {
    $.ajax({
        url: '/starring',
        method: 'POST',
        data:{"id":id},
        success: function (response) {
          let objs = JSON.parse(response)
            for (let i = 0; i < responseData.length; i++) {
              if(responseData[i].id == id)
              {
                responseData[i].is_starred =objs[0].is_starred;
              } 
            }
            listOfData(responseData)
        }
    })
  }




  function deleted(id) {

    $.ajax({
        url: '/deleted',
        method: 'POST',
        data:{"id":id},
        success: function (response) {
          let objs = JSON.parse(response)
            for (let i = 0; i < responseData.length; i++) {
              if(responseData[i].id == id)
              {
                responseData[i].delete_at  = objs[0].delete_at;
              } 
            }
            deletedData = [];

            responseData.forEach(element => {
              if(!element.delete_at){
                deletedData.push(element);
             }
            });
            listOfData(deletedData)
        }
    })
  }




function click(datas) {

    const starredIcons = document.querySelectorAll(".starred")

    for (let i = 0; i < datas.length; i++) {
        if (Number(datas[i].is_starred)) {
            starredIcons[i].innerHTML = `<i class="fa-solid fa-star starreds"  id=${datas[i].id}></i>`
        }
        else {
            starredIcons[i].innerHTML = `<i class="fa-regular fa-star starreds"  id=${datas[i].id}></i>`
        }
    }

    $(".starreds").click(function (e) {
     
        let id = e.target.id;
        starred(id);
      });
    
      $(".deleted").click(function (e) {

        let id = e.target.id;
        deleted(id)
 
        
      });

}