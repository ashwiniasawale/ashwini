<?php session_start();
include ('include/dbconn.php');
date_default_timezone_set('Asia/Kolkata');

 ?>
<!DOCTYPE html>

<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="sheet.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

 <body> 
 




<div style="width: 50%; margin: auto">

<div id="contact_form" style="background-color: #f2f2f2;">
<span id="taable"></span>
<form  name="myForm"  method="post" >
 <fieldset>
   
   <label for="name"><b>Name:</b></label>
   <input type="text" id="name" name="name" placeholder="Enter your Name.." required><br><span id ="user" class="formerror" required></span><br>
   
   <label for="birthday"><b>DOB:</b></label>
   <input type="date" id="birthday" name="dob"  min="1940-01-01" max="<?php echo date('Y-m-d');?>" required pattern="\d{4}-\d{2}-\d{2}" ><br><span id ="dob" class="formerror" required></span> <font color='red'>[date format :(dd-Mmm-yyyy) 05-Jan-1983]</font><br>
   
   <label for="age"><b>Age (As on 31/05/2021):</b></label>
   <input type="text" required id="age" name="age" placeholder="Enter your age.."><br><span id ="ag" class="formerror"></span><br>
    
	<label for="address"><b>Address:<b></label>
    <textarea id="address" name="address" rows="4" required cols="50" placeholder="Enter your address.." ></textarea><br><span id="add"class="formerror"></span><br>
  
    
   <label for="city"><b>City</b></label>
   <input type="text" id="city" required name="city" placeholder="City.."><br><span id="ci" class="formerror"></span><br>
   
  <label for="state"><b>State</b></label>
   <input type="text" id="state" name="state" placeholder="State.."><br><span id="st" class="formerror"></span><br>
  
  <button type="submit" name="submit">Submit</button>
 
 <br>
 <br>
 
 </div>
 </fieldset>
 
   
</form> 
</div>

<div id="view_rec">
</div>
<script>
$(document).ready(function() {
	$.ajax({
			    type: "POST",
			    url: "include/upload.php",
			    //data: { name:name, dob:dob, address:address, city:city,state:state,age:age },
			   
			   success: function(result){
				   //alert(result)
			       document.getElementById("view_rec").innerHTML=result;
					
			    }
			});
});	
function add_data()
{
	 document.getElementById("name").value="";
				   document.getElementById("age").value="";
				   document.getElementById("birthday").value="";
				   document.getElementById("address").value="";
				   document.getElementById("city").value="";
				   document.getElementById("state").value="";
				   document.getElementById("patient_id").value="";
			   
}
function edit_data(patient_id)
{
	$.ajax({
			    type: "POST",
			    url: "include/update.php",
			    data: { patient_id:patient_id},
			   
			   success: function(result){
				   //alert(result)
				  var da= result.split('#');
				  alert(da[2]);
			      document.getElementById("name").value=da[0];
				   document.getElementById("age").value=da[1];
				   document.getElementById("birthday").value=da[2];
				   document.getElementById("address").value=da[3];
				   document.getElementById("city").value=da[4];
				   document.getElementById("state").value=da[5];
				   document.getElementById("patient_id").value=patient_id;
			    }
			});
}

function delete_data(patient_id)
{
	//alert(patient_id);
	$.ajax({
			    type: "POST",
			    url: "include/delete.php",
			    data: { patient_id:patient_id},
			   
			   success: function(result){
				   //alert(result)
			       document.getElementById("view_rec").innerHTML=result;
				   
			    }
			});
}


//////////for Add details
	 $("button").click(function(e)
	 {
		 
 
		 //alert('hii');
		event.preventDefault();
			var	name = $('#name').val();
			//alert(name);
			var	dob = $('#birthday').val();
			var patient_id=$('#patient_id').val();
			var	age = $('#age').val();
			var	city = $('#city').val();
			var	state = $('#state').val();
			var	address = $('#address').val();
			if(name == ""){
          document.getElementById('user').innerHTML = " **Please fill the name";
	    return false;
	    }else{
			document.getElementById('user').innerHTML ="";
		}
		
     if(address=="") {
       document.getElementById('add').innerHTML = "**Please enter your address";
      return false;
       }else{
		   document.getElementById('add').innerHTML="";
	   }		   
 
	 
	if(age=="") {
       document.getElementById('ag').innerHTML = "**Please enter age as on 31/05/2021";
      return false;
     }else{
		 document.getElementById('ag').innerHTML='';
	 }		 

   	if(city=="") {
       document.getElementById('ci').innerHTML = "**Please enter Your city";
      return false;
       }else{
		   document.getElementById('ci').innerHTML ='';
	   }
 	if(state=="") {
       document.getElementById('st').innerHTML = "**Please enter Your state";
      return false;
       }else{
		   document.getElementById('st').innerHTML ='';
	   }		   
    
			$.ajax({
			    type: "POST",
			    url: "include/upload.php",
			    data: { name:name, dob:dob, address:address, city:city,state:state,age:age,patient_id:patient_id },
			   
			   success: function(result){
				   //alert(result)
				   
			       document.getElementById("view_rec").innerHTML=result;
				   
			    }
			});
	 }
	 );
	
  //return false;
  </script>
</body>
</html> 