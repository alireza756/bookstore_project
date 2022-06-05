const ctrlBtn = document.querySelector('.menu');
const sideBar = document.querySelector('.sidebar');

ctrlBtn.addEventListener('click' , ()=>{
  sideBar.classList.toggle('show');
  ctrlBtn.classList.toggle('open');
})

function check(){
  alert("دوست من این قسمت از سایت هنوز در حال ساخت است");
}