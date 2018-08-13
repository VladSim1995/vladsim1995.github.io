$(document).ready(function(){
  
    $("#newsticker").jCarouselLite({
        vertical: true,
        hoverPause: true,
        btnPrev: "#news-prev",
        btnNext: "#news-next",
        visible: 3,
        auto: 3000,
        speed:500
    })  ;
    
});

$('#genpass').click(function(){
 $.ajax({
  type: "POST",
  url: "/functions/genpass.php",
  dataType: "html",
  cache: false,
  success: function(data) {
  $('#reg_pass').val(data);
  }
});
 
}); 