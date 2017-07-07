$(document).ready(function(){

  $(".button").click(function(){
    var product = $(this).parent().parent();
    //console.log(product);
    var product_id = product.children(":first").text();
    var quantity = product.find(".selectBoxCat :selected").text();
    Cookies.set(product_id, quantity, {expires: 1});
    //console.log("totale cookie salvati: "Object.keys(Cookies.get()).length);
    //aggiorno l'html del carrello
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

  $("#content").on('click', '.button2',function(){
    var product = $(this).parent();
    var product_id = product.children(":first").text();
    var quantity = product.find(".selectBoxCat :selected").text();
    Cookies.set(product_id, quantity, {expires: 1});
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

    $("#content").on('click', '#buyLastProduct',function(){
      var product = $(this).parent();
      console.log(product);
      var product_id = product.children(":first").text();
      product_id = product_id.trim();
      var quantity = 1;
      Cookies.set(product_id, quantity, {expires: 1});
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
