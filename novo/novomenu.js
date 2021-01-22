$(document).ready(function() {
    var botao = $('.bt1');
    var dropDown = $('.ul-albuns');    
    document.getElementById("topo").style.zIndex = "-1";
       botao.on('click', function(event){
           dropDown.stop(true,true).slideToggle();
           event.stopPropagation();
       });
   });