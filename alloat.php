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
<title>Alloat</title>
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
			  if(mysqli_connect_errno())
			 {  
          die("Failed to connect with MySQL: ". mysqli_connect_error());  
             }else{
		  $sql = "Select id,fullname from doctor";
          $result = mysqli_query($con, $sql);
		  $num = mysqli_num_rows($result);
		  
		  echo"
		<div class='login-form'>
	<form method='post'>
        <h2 class='text-center'>Aloat Doctors to Patient</h2> 
		<div class = 'row'>
		 <div class='col-xs-6 col-sm-6 col-md-6'>
        <div class='form-group'>
          <label for='doctor_id'>Doctors</label>
           <select name='doctor_id' class='form-control'>";
	if($num > 0){
		while($v = mysqli_fetch_array($result))
                 {
	               echo "
				 <option value={$v['id']}>{$v['fullname']}</option>";
                        }
	echo"</select>
		</div>
		   </div>";	
	}else{
        $error = "No data Found !!";
	}
	
	
	  $sql1 = "Select id,fullname from patient";
          $result1 = mysqli_query($con, $sql1);
		  $num1 = mysqli_num_rows($result1);
	
	echo"<div class='col-xs-6 col-sm-6 col-md-6'>
        <div class='form-group'>
          <label for='patient_id'>Patients</label>
           <select name='patient_id' class='form-control'>";
	if($num1 > 0){
		while($v1 = mysqli_fetch_array($result1))
                 {
	               echo "
				 <option value={$v1['fullname']}>{$v1['fullname']}</option>";
                        }
	echo"</select>
		</div>
		   </div>";	
	}else{
        $error = "No data Found !!";
	}
	
	echo"</div>";
			 }
?>



<?php
     if( isset($_REQUEST['alloat'])){
	   $doctor_id = $_REQUEST['doctor_id'];
	   $patient_id = $_REQUEST['patient_id'];
	   $disease_name = $_REQUEST['disease_name'];
	   $appointment_datetime = $_REQUEST['appointment_datetime'];
	   $last_appointment_datetime = $_REQUEST['last_appointment_datetime'];
	
	    
          $q = "insert into alloat values('','$doctor_id','$patient_id','$disease_name','$appointment_datetime','$last_appointment_datetime','0')";
          $result = mysqli_query($con, $q);
            if ($result) {
				echo "<script>
	             alert('Alloated Successfully !!!');
				 window.location.href = 'alloat.php';
	                 </script>";
            }  
    }

?>
		
		<div class = "row">
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
		    <label for="disease_name">Disease Name</label>
			<select name="disease_name" class="form-control">
			  <option value="none" selected disabled hidden>Select an Option</option>
              <option value="cancer">Cancer</option>
              <option value="stroke">Stroke</option>
			  <option value="diabetes">Diabetes</option>
			  <option value="tuberculosis">Tuberculosis</option>
			  <option value="covid-19">COVID-19</option>
			  <option value="vector-borne">Vector-borne</option>
       </select>
		</div>
		   </div>
		   
		   <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="appointment_datetime">Appointment Date & Time</label>
          <input type="datetime-local" class="form-control" name="appointment_datetime" required="required">
		</div>
		   </div>
		</div>
		
		
		<div class = "row">
		<div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <label for="last_appointment_datetime">Last Appointment Date & Time</label>
          <input type="datetime-local" class="form-control" name="last_appointment_datetime" required="required">
		</div>
		   </div>
		
		<div class="col-xs-6 col-sm-6 col-md-6">
		<div class="form-group">
		    <label for="alloat">Click here to Alloat</label>
            <button type="submit" name="alloat" class="btn btn-primary btn-block">Alloat</button>
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