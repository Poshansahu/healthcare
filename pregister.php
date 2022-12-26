<?php
// Start the session
session_start();
if(!isset ($_SESSION['admin'])){
   header("Location: index.php");
}else{
?>
<!DOCTYPE html>
<?php error_reporting(0); ?> 
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Register</title>
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
	<?php
        if(isset($_REQUEST['register']))
		{
				 $error=''; //Variable to Store error message;
			  $con = mysqli_connect('localhost','root','','portal');  
			  if(mysqli_connect_errno())
			 {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
             }else
	                                      {
	                                       $fullname = $_REQUEST['fullname'];
     	                                   $primary_contact_number = $_REQUEST['primary_contact_number'];
     	                                   $secondary_contact_number = $_REQUEST['secondary_contact_number'];
										   $address = $_REQUEST['address'];
										   $adharcard_number = $_REQUEST['adharcard_number'];
										   $pancard_number = $_REQUEST['pancard_number'];
										   $username = $_REQUEST['username'];
										   $status = $_REQUEST['status'];
										   $password = $_REQUEST['password'];
										    $cpassword = $_REQUEST['cpassword'];
	                                        
		  $sql = "Select * from doctor where username='$username'";
          $result = mysqli_query($con, $sql);
          $num = mysqli_num_rows($result);
	if($num == 0) {
        if($password == $cpassword) {
          $q = "insert into patient values('','$fullname','$primary_contact_number','$secondary_contact_number','$address','$adharcard_number','$pancard_number','$username','$password','$status')";
          $result = mysqli_query($con, $q);
            if ($result) {
				echo "<script>
	             alert('Patient Registered !!!');
				 window.location.href = 'admindashboard.php';
	                 </script>";
            }
		}
        else { 
            $error = "Passwords do not match"; 
        }      
    }
   if($num>0) 
   {
      $error="Username not available"; 
   }
   }
    mysqli_close($con); // Closing connection
		}
  ?>
<body>
<script type="text/javascript">
            function showMessage() {
                alert("logged out successfully");
				window.location.href = "logout.php";
            }
</script>
<div class="login-form">
	<form method="post">
        <h2 class="text-center">Register Patient</h2>  
       	
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required">
		</div>
		   </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Primary Contact No." name="primary_contact_number" required="required">
		</div>
		   </div>
		</div>		
		
		
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Secondary Contact No." name="secondary_contact_number" required="required">
		</div>
		   </div>
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Address" name="address" required="required">
		</div>
		   </div>
		</div>
		
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Adhar Number" name="adharcard_number" required="required">
		</div>
		   </div>
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Pan Number" name="pancard_number" required="required">
		</div>
		   </div>
		</div>
		
		
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
		    <label for="username">Username</label>
           <input type="text" class="form-control" placeholder="username" name="username" required="required">
		</div>
		   </div>
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="status">Status</label>
           <select name="status" class="form-control">
    <option value="0">0</option>
    <option value="1" selected>1</option>
       </select>
		</div>
		   </div>
		</div>
		
		<div class = "row">
		<div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
		  <input type="password" class="form-control" placeholder="Password" name="password" required="required">
		</div>
		   </div>
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
		  <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" required="required">
		</div>
		   </div>
		</div>
		
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
		</div>
		   </div>
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <button type="button" name="logout" class="btn btn-primary btn-block" onClick="showMessage()">Log Out</button>
		</div>
		   </div>
		</div>
		<!-- Error Message -->
    <span><?php echo $error; ?></span>
    </form>	
</body>
</html>
<?php
}
?>