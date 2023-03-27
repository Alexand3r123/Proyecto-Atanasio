var Burguermenu = document.getElementById('Burguer-menu');
var show = document.getElementById('menu');

Burguermenu.addEventListener('click', function(){
    this.classList.toggle("close");
    show.classList.toggle("show");
})// JavaScript Document