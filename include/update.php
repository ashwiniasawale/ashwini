<?php 
include ('dbconn.php');
date_default_timezone_set('Asia/Kolkata');

$select_record="select name,age,dob,address,city,state,added_date,patient_id from patient_details where patient_id='".$_POST['patient_id']."'";
   $ptr_record=mysqli_query($mysqli,$select_record); 
   $fetch_record=mysqli_fetch_array($ptr_record);
   
   echo trim($fetch_record['name']).'#'.trim($fetch_record['age']).'#'.trim($fetch_record['dob']).'#'.trim($fetch_record['address']).'#'.trim($fetch_record['city']).'#'.trim($fetch_record['state']);
   
  
  
?>