<?php
// Start the session
session_start();
if(!isset ($_SESSION['doctor'])){
   header("Location: doctorlogin.php");
}else{
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Doctor Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body{
    background-color: #0080ff;
}
a:link, a:visited {
    text-decoration: none;
    color: black;
    cursor: pointer;   
}
.login-form {
    width: 550px;
    margin: 50px auto;
  	font-size: 15px;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 8px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
	
	<?php
			  $error=''; //Variable to Store error message;
			  $con = mysqli_connect('localhost','root','','portal');  
              $doctor_id=$_SESSION['doctor'];
			  if(mysqli_connect_errno())
			 {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
             }else{
		  $sql = "Select patient_id,status from alloat where doctor_id='$doctor_id'";
          $result = mysqli_query($con, $sql);
		  $num = mysqli_num_rows($result);
		  
		  echo"
		<div class='login-form'>
	<form method='post'>
        <h2 class='text-center'>Welcome Doctor</h2> 
		<div class = 'row'>
		 <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-group'>
          <label for='patient_id'>Alloated Patients</label>
           <select name='patient_id' class='form-control'>";
			 }
			 

	if($num > 0){
		while($v = mysqli_fetch_array($result))
                 {
                    if($v['status']==0){
                        $status='Pending';
                    }if($v['status']==1){
                        $status='Completed';
                    }if($v['status']==2){
                        $status='Processing';
                    }if($v['status']==3){
                        $status='Hold';
                    }if($v['status']==4){
                        $status='Terminate';
                    }
	               echo "
				 <option value={$v['patient_id']}>{$v['patient_id']}:$status</option>";
                        }
	    echo"</select></div></div></div>";
	}
	else{
        $error = "No data Found !!";
	}
    
    
    //update code

if(isset ($_REQUEST['complete']))
	{
$patient_id=$_REQUEST['patient_id'];
$q = "update alloat set status = '1' where patient_id='$patient_id'";
$rs = mysqli_query($con, $q);
	
  if($rs)
   {
	  echo "<script>
	             alert('Status Updated Successfully !!!');
				 window.location.href = 'doctordashboard.php';
	                 </script>";
   }
   else
   {
	   $error="Not Updated ! Something Went Wrong";
   }
	}

    if(isset ($_REQUEST['processing']))
	{
$patient_id=$_REQUEST['patient_id'];
$q = "update alloat set status = '2' where patient_id='$patient_id'";
$rs = mysqli_query($con, $q);
	
  if($rs)
   {
	  echo "<script>
	             alert('Status Updated Successfully !!!');
				 window.location.href = 'doctordashboard.php';
	                 </script>";
   }
   else
   {
	   $error="Not Updated ! Something Went Wrong";
   }
	}


    if(isset ($_REQUEST['hold']))
	{
$patient_id=$_REQUEST['patient_id'];
$q = "update alloat set status = '3' where patient_id='$patient_id'";
$rs = mysqli_query($con, $q);
	
  if($rs)
   {
	  echo "<script>
	             alert('Status Updated Successfully !!!');
				 window.location.href = 'doctordashboard.php';
	                 </script>";
   }
   else
   {
	   $error="Not Updated ! Something Went Wrong";
   }
	}
	?>
		
		<div class = "row">
		   <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <button type="submit" name="complete" class="btn btn-success btn-block">Completed</button>
		</div>
		   </div>
		   <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <button type="submit" name="processing" class="btn btn-warning btn-block">Processing</button>
		</div>
		   </div>
		   <div class="col-xs-4 col-sm-4 col-md-4">
       <div class="form-group">
            <button type="submit" name="hold" class="btn btn-danger btn-block">Hold</button>
		</div>
		   </div>
		</div>
		
        <div class="form-group">
            <button type="button" name="logout" class="btn btn-primary btn-block" onClick="showMessage()">Log Out</button>
		</div>
		   
		
		
 <!-- Error Message -->
    <span><?php echo $error; ?></span>
		</form>
<script type="text/javascript">
            function showMessage() {
                alert("logged out successfully");
				window.location.href = "logout.php";
            }
</script>      
 
</body>
</html>
<?php
}
?>
