$(document).ready(function(){
  var index = location.href.indexOf("keyword=");
  if(index > 0){
    $('#pagingOptions').hide();
  }
});
