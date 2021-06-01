var button = document.querySelector('.modal-open');
button.foreah(function(btn){
  btn.onclick=function(){
    var modal =btn.getAttribute('data-modal');

    document.getElementById(modal).style.display="block";
  }
});