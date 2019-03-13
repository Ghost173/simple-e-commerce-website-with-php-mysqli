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

  $("#signup_button").click(function(event){
	  //alert(0);
	  event.preventDefault();
	  $.ajax({
		url		:	"register.php",
		method	:	"POST",
		data	:	$("form").serialize(),
		success	:	function(data){
		//alert(data);
		$("#signup_msg").html(data);
		}
	})
  })

  $("#Login").click(function(event){
	event.preventDefault();
	var email = $("#email").val();
	var pass = $("#password").val();
	//alert(0);
	$.ajax ({
		url : "login.php",
		method : "POST",
		data : {userLogin:1,userEmail:email, userPassword:pass},
		success :function(data) {
			//alert(data);
		if (data == "loginsuccess"){
			//alert(data)
			window.location.href = "profile.php";
		}
		}
	})
  })

  // add to cart
  cart_count();
  $("body").delegate("#product","click",function(event){
	  event.preventDefault();
	//alert(0);
	var p_id = $(this).attr('pid');
	//alert(p_id);
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {addProduct:1,proId:p_id},
		success : function(data){
			//alert(data);
			$("#product_img").html(data);	
			cart_count();
		}
	})
  })
	 
 // cart increment
 cart_container();
 function cart_container (){
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {get_cart_product:1},
		success : function(data){
			//alert(data);
		$("#cart_product").html(data);	
		}	
	})
	
 };

 function cart_count() {
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {cart_count:1},
		success : function(data){
			//alert(data);
		$(".badge").html(data);	
		}	
	})
 };
//  $("#cart_container").click(function(event){
// event.preventDefault();
// //alert(0);


//  })
//cart check out
 car_checkout();
function car_checkout() {
	$.ajax ({
		url : "action.php",
		method : "POST",
		data : {car_checkout:1},
		success : function(data) {
			$("#cart_checkout").html(data);
		}
	})
}

// cart qty
$("body").delegate(".qty","keyup",function(){
	//alert(0);
	var pid = $(this).attr("pid");
	//alert(pid);
	var qty = $("#qty-"+pid).val();
	var price =$("#price-"+pid).val();
	var total = qty * price ;
	//alert(total);
	$("#total-"+pid).val(total);
})
//edit cart
$("body").delegate(".remove","click", function(event){
event.preventDefault();
var pid = $(this).attr("remove_id");
//alert(pid);
$.ajax({
	url : "action.php",
	method : "POST",
	data : {removefromcart:1,removeid:pid},	
	success : function(data){
		//alert(data);
		$("#cart_msg").html(data);
		car_checkout();
	}
})

})
//delete cart
$("body").delegate(".update","click", function(event){
	event.preventDefault();
	var pid = $(this).attr("update_id");
	//alert(pid);
	var qty =$("#qty-"+pid).val();
	var price =$("#price-"+pid).val();
	var total =$("#total-"+pid).val();
	$.ajax({
		url : "action.php",
		method : "POST",
		data : {updatproduct:1,updateid:pid,qty:qty,price:price,total:total},
		success :function(data){
			$("#cart_msg").html(data);
			car_checkout();
		}
	})
	})
//  	page();
// function page() {
// 	$.ajax ({
// 		url: "action.php",
// 		method:"POST",
// 		data:{page:1},
// 		success:function(data){
// 			//alert(data);
// 		$("#pageno").html(data);
// 		}
// 	})
// }
page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
$("body").delegate("#page","click",function(){
	var pn = $(this).attr("page");
	//alert(pn);
	$.ajax({
		url	:	"action.php",
		method	:	"POST",
		data	:	{getproduct:1,setpage:1,pageno:pn},
		success	:	function(data){
			$("#get_product").html(data);
		}
	})
})

})