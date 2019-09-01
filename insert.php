<?php
 include ("session.php"); 
 include ("function.php");
include 'conn.php';
$nameErr = $emailErr =$creditErr="";
if(isset($_POST['submit'])){

	$username=$_POST['Username'];
	$email=$_POST['email'];
  $credit=$_POST['CurrentCredit'];

  if (empty($username)) {
    $nameErr = "Name is required";
  } 
  elseif (empty($email)) {
    $emailErr = "Email is required";
  }
  elseif (!preg_match('/^[0-9]*$/', $credit)) {
        $creditErr="Credit should be digit only";
    }
  elseif (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $nameErr = "Only letters and white space allowed"; 
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
    
 else{
$username = test_input($username);
$email = test_input($email);



            $sql="INSERT INTO `user_d`(`name`, `email`, `CurrentCredit`) VALUES ('$username','$email','$credit')";
       
                	if(mysql_query($sql)){
                            echo "insert sucessfully";
                            header('location: display.php');
                	}else{
                	echo "Error: " . $sql . "<br>" . mysql_error();
          }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}
                

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
 <style>
.error {color: #FF0000;}
</style>
</head>
<body>
<div class="col-lg-6 m-auto">
	<form method="post">
          <br><br>

          <div class="card">
            	<div class="card-header bg-dark">
          <h1 class="text-white text-center">Insert Operation</h1>
           	</div>
            <br>
           	<label>Username: <span class="error">* <?php echo $nameErr;?></span></label>
            
           <input type="text"    name="Username" class="form-control">

           <br>
           <label>Email <span class="error">* <?php echo $emailErr;?></span></label>
           
           <input type="text" name="email" class="form-control">

           <br>
           <label>Credit<span class="error">* <?php echo $creditErr;?></span></label>
           
           <input type="text" name="CurrentCredit" class="form-control">

           <br>
           <br>
           <button  class="btn btn-success" type="submit" name="submit">Insert User</button><br>
           </div>
	</form>
</div>
     
</body>
</html>