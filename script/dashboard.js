$(function(){
    $('#notify').slimScroll({
        height:'auto',
        size:'7px',
        wheelstep:'100',
        barClass:'notify-scrollbar'
    });
});

// live date/time system
const dateWrap=document.querySelector('#profile-date');
const timeWrap=document.querySelector('#live-time');

let date=new Date();
let day=date.getDate();
let month=date.getMonth()+1;
let year=date.getFullYear();

dateWrap.textContent=day+'-'+month+'-'+year;

// get real time
let h=date.getHours();
let m=date.getMinutes();
let s=date.getSeconds();

function liveTime(){
   let time=new Date();

   let hour=time.getHours();
   let min=time.getMinutes(); 
   let sec=time.getSeconds();

   min=checkTime(min);
   sec=checkTime(sec);

   timeWrap.textContent=hour+':'+min+':'+sec;

   setTimeout(function(){
    liveTime();
   },1000);
}

window.onload=function(){
  liveTime();
}

// adding 0 before number
function checkTime(i){
  if(i<10){
    i="0"+i;
  }
  return i;
}

// profile angle down
const logoutBtn=document.querySelector('#profile-angle-down');
const logoutDrop=document.querySelector('#logout-dropdown');

function logout(){

  logoutDrop.classList.toggle("logout-dropdown");
}

logoutBtn.onclick=function(){
  logout();
}

// search box
const searchBtn=document.querySelector('#profile-search');
const searchBox=document.querySelector('#search-box');

function displaySearch(){

  searchBox.classList.toggle("profile-search-box");
}

searchBtn.onclick=function(){
  displaySearch();
}

// function navBtn(){
//     let saveBtn=document.querySelector('.owl-next');
//     let prevBtn=document.querySelector('.owl-prev');
//     let nextBtn=document.querySelector('.owl-next');

//     saveBtn.setAttribute('type','submit');
//     saveBtn.setAttribute('name','next');

//     prevBtn.innerHTML='<span class="btn btn-danger px-4 m-3" aria-label="Previous"><i class="fas fa-arrow-circle-left"></i> Prev</span>';
//     nextBtn.innerHTML='<span class="btn btn-success px-4 m-3" aria-label="Next">Next &nbsp;<i class="fas fa-arrow-circle-right"></i></span>';
// }

// window.onload=function(){
//   navBtn();
// }