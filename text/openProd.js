
$(document).ready(function(){



  $(".dbutton").click(function(){

   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);
   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        //idp: $(".idp0").text()
        idp: $(this).parent().children(":first").text()
    },
    dataType: "html",
    success: function(data) {
      var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
       $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
  });
  });



  /*$(".open0").click(function(){

   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);
   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp0").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


  $(".open1").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);
   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp1").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open2").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp2").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open3").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp3").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open4").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp4").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open5").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp5").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open6").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp6").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});



	$(".open7").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp7").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


	$(".open8").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp8").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});



	$(".open9").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp9").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});


		$(".open10").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp10").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});

			$(".open11").click(function(){
   //var idprod= $(".idp1").text();
   //window.history.pushState(null, null, "/prog/catalogo.php?idp="+idprod);

   $.ajax({
    method: "POST",
    url: "/prog/php/singleProd.php",
    data:
    {
        idp: $(".idp11").text()
    },
    dataType: "html",
    success: function(data) {
    	var result = $("#prodDescription").replaceWith(data);
    },
    complete: function(xhr, status){
    	 $("html, body").animate({ scrollTop: 250 }, "slow");
  if ( $("#prodDescription").css("display") == "none" ){
     $("#prodDescription").show("slow");
       }
    }
	});
});*/


});
