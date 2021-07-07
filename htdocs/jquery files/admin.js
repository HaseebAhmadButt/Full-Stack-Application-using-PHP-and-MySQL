$(function(){
  $("#table").hide();
  $(".messages").hide();
  $(".category").hide();
  $(".addition_product").hide();
  $(".showing_product").hide();
  $("#cat_head").on('click',function(){
  $(".addition_product").hide();
  $(".showing_product").hide();
  $(".Updating_product").hide();
  $("#up_pr_form").hide();
  $(".messages").hide();
  var a= $("#table").is(":visible");
  if (a) {
    $("#table").hide();
    $(".category").hide();
  }
  else{
  $("#table").fadeIn("1000");
  }
  });
$("#all_categori").on('click', function(){
    $(".category").slideDown();
    $(".categories").slideDown("1000");
    $(".new_category").hide();
    $(".change_category").hide();
    $(".remove_category").hide();

});
$("#add_categori").on('click', function(){
    $(".category").slideDown();
    $(".categories").hide();
    $(".new_category").slideDown("1000");
    $(".change_category").hide();
    $(".remove_category").hide();
});
$("#updat_categori").on('click', function(){
    $(".category").slideDown();
    $(".categories").hide();
    $(".new_category").hide();
    $(".change_category").slideDown("1000");
    $(".remove_category").hide();
    $("#change li").on("click", function(index){
      $("#change_input").val($(this).html());
    });
  });
$("#del_categori").on('click', function(){
    $(".category").slideDown();
    $(".categories").hide();
    $(".new_category").hide();
    $(".change_category").hide();
    $(".remove_category").slideDown("1000");
    $("#delete li").on("click", function(index){
      $("#remove_input").val($(this).html());
    });
});
$("#add_product").on("click", function(){
  $("#table").hide();
  $(".category").hide();
  $("#up_pr_form").hide();
  $(".messages").hide();
  $(".showing_product").hide();
  if ($(".addition_product").is(":visible")) {
    $(".addition_product").slideUp("1000");
  }
  else{
  $(".addition_product").slideDown("1000");
  $("#brand li").on("click", function(index){
    $("#brand_input").val($(this).html());
  });
  $("#status li").on("click", function(index){
    $("#status_input").val($(this).html());
  });

  }
});
$("#all_product").on("click", function(){
  $("#table").hide();
  $(".category").hide();
  $(".addition_product").hide();
  $("#up_pr_form").hide();
  $(".messages").hide();
  if($(".showing_product").is(":visible")){
    $(".showing_product").slideUp("1000");
  }
  else {
      $(".showing_product").slideDown("1000");
  }
});
});
