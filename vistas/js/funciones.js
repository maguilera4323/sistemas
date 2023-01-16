const btn =document.querySelector('#menu-btn');
const menu=document.querySelector('#sidemenu');

btn.addEventListener('click',function(){
    menu.classList.toggle('menu-expanded');
    menu.classList.toggle('menu-collapsed');
});




