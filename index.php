<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Home</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body{
    background-color: #0080ff;
}
.login-form {
    width: 340px;
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
	 $error=''; //Variable to Store error message;
	 if(isset ($_REQUEST['login']))
           {
		     $con = mysqli_connect('localhost','root','','portal');
             if(mysqli_connect_errno())
			 {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
             }
			 else{
				$username = $_REQUEST['username'];
			    $pass = $_REQUEST['password'];  
				
				$q =  "select * from admin where username = '$username' AND password = '$pass'";
				$rs = mysqli_query($con, $q);
                $rows = mysqli_num_rows($rs);
             if($rows == 1)
			 {
             $_SESSION['admin']= $username;
             header("Location: admindashboard.php"); // Redirecting to other page
             }
            else
             {
          $error = "Invalid username or password !!";
             }
 mysqli_close($con); // Closing connection				
			  }		
		}
?>
<body>
<div class="login-form">
	<form method="post">
        <h2 class="text-center">Admin Login</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="login" class="btn btn-primary btn-block">Log in</button>
        </div> 

 	<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <p> Are you a Doctor ? </p>
		</div>
		   </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
           <a href="doctorlogin.php"> Click here to Login</a>
		</div>
		   </div>
		</div>	
		
 <!-- Error Message -->
    <span><?php echo $error; ?></span>		
    </form>
</body>
</html>