$(document).ready(function(){
    $(".auth-content form div input").on("input", function(){
      if($(this).val()){
        $(this).css("background-color", "#fff");
        $(this).css("border-color", "#478dff");
      } else {
        $(this).css("background-color", "#dee1e2"); // original color
      }
    });
  });


  