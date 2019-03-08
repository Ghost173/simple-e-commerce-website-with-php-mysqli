$(document).ready(function(){
   //alert("hello");   // this is for testing js working or not :D
   cat();
   brand();
   product();
   //category
   function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
   }
   //barnds
   function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
				
			}
		})
   }
   
// /product
   function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getproduct:1},
			success	:	function(data){
				$("#get_product").html(data);
				
			}
		})
   }
   
//categort in side menu
   $("body").delegate(".category","click",function(event){
		event.preventDefault();
		var cid = $(this).attr('cid');
		//alert(cid);
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				
			}
		})
	
   })
   
   // brand in side menu
   $("body").delegate(".selectbrand","click",function(event){
		event.preventDefault();
		var bid = $(this).attr('bid');
		//alert(cid);
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectbrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				
			}
		})
	
   })
   //sarch
  $("#search_btn").click(function(){
   var keyword = $("#search").val();
     if (keyword != "") {
      $.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){
				$("#get_product").html(data);
				
			}
		})
     }
  })
})