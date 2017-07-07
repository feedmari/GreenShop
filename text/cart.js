$(document).ready(function(){


  $("#cart").on("click", function() {
    $(".shopping-cart").fadeToggle( "fast");

  });

  $('#svuotaCarrello').on("click", function(){

    console.log(Cookies.get());
    for(var i=0; i<999;i++){
      Cookies.remove(i);
    }
    $.ajax({
    url: "/prog/php/updateCart.php",
    dataType: "html",
    cache: false,
    success: function(data) {
      $(".shopping-cart").replaceWith(data);
       //aggiorno il numero dei prodotti nel carrello
      $(".badge").text(Object.keys(Cookies.get()).length);
    }
    });
  });
});
