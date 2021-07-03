<?php 
include ('dbconn.php');
date_default_timezone_set('Asia/Kolkata');

$delete_record="delete from patient_details where patient_id='".$_POST['patient_id']."'";
$select_delete=mysqli_query($mysqli,$delete_record);
   $select_record="select name,age,dob,address,city,state,added_date,patient_id from patient_details";
   $ptr_record=mysqli_query($mysqli,$select_record);
   $data ='';
   if(mysqli_num_rows($ptr_record))
   {
	   $data.='<div class="container"><table class="table table-bordered">';
		$data .='<thead><tr><th>Name</th><th>Age</th><th>DOB</th><th>Address</th><th>City</th><th>State</th><th>Added Date</th><th>Edit</th><th>Delete</th></tr></thead> <tbody>';
		
		while($fetch_data=mysqli_fetch_array($ptr_record))
		{
			$data .='<tr>';
			$data .='<td>'.$fetch_data['name'].'</td>';
			$data .='<td>'.$fetch_data['age'].'</td>';
			$data .='<td>'.$fetch_data['dob'].'</td>';
			$data .='<td>'.$fetch_data['address'].'</td>';
			$data .='<td>'.$fetch_data['city'].'</td>';
			$data .='<td>'.$fetch_data['state'].'</td>';
			$data .='<td>'.$fetch_data['added_date'].'</td>';
			$data .='<td><button type="button" class="btn btn-danger" onclick="edit_data('.$fetch_data['patient_id'].')">Edit</button><button type="button" class="btn btn-danger" onclick="add_data()">Add</button></td>';
			$data .='<td><button type="button" class="btn btn-danger" onclick="delete_data('.$fetch_data['patient_id'].')">Delete</button></td>';
			$data .='</tr>';
		}
	   $data .=' </tbody></table></div>';
	   
	   

   }
  
  echo $data;
  
?>