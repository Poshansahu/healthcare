<?php
// Start the session
session_start();
if(!isset ($_SESSION['admin'])){
   header("Location: index.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin</title>
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
<body>
<script type="text/javascript">
            function showMessage() {
                alert("logged out successfully");
				window.location.href = "logout.php";
            }
</script>
<div class="login-form">
	<form method="post">
        <h2 class="text-center">Welcom Admin</h2>       
        <div class="form-group">
            <button type="button" name="registerdoctors" class="btn btn-primary btn-block" onClick="document.location.href='dregister.php'">Register Doctors</button>
        </div>
        <div class="form-group">
            <button type="button" name="registerpatients" class="btn btn-primary btn-block" onClick="document.location.href='pregister.php'">Register Patients</button>
        </div>  
        <div class="form-group">
            <button type="button" name="alloatdoctors" class="btn btn-primary btn-block" onClick="document.location.href='alloat.php'">Alloat Doctors</button>
        </div>
		<div class="form-group">
            <button type="button" name="logout" class="btn btn-primary btn-block" onClick="showMessage()">Log Out</button>
        </div>
    </form>
</body>
</html>
<?php
}
?>