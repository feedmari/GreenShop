$(document).ready(function(){

  $(".grid-element").hover(function(){
    var id = $(this).attr('id');
    var elem = $("#"+id);
    $(elem).css("background-color","#16a085");
  },
  function(){
    var id = $(this).attr('id');
    var elem = $("#"+id);
    $(elem).css("background-color","white");
  });

});
