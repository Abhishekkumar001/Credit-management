<?php
 include ("session.php"); 
include 'conn.php';
include ("function.php");
if(isset($_POST['submit'])){
  $id=$_GET['id'];
	$username=$_POST['Username'];
	$email=$_POST['email'];
          $cedit=$_POST['CurrentCredit'];

          if($credit>0){
 echo $_SESSION["ErrorMessage"]="you can't enter negative credit";
redirect_to("display.php");
  
          }else{
        $sql =" update user_d set id=$id,name='$username',email='$email',CurrentCredit='$cedit' where id=$id";
                 if(mysql_query($sql)){
                         $_SESSION["SuccessMessage"]="Update successfully";
             redirect_to("display.php");
                	}else{
                	$_SESSION["ErrorMessage"]="Something Went wrong. Try again! ";
             redirect_to("display.php");
                }
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
 
</head>
<body>
<div class="col-lg-6 m-auto">
         <?php 
                   $select = $_GET['id'];
                   global $connDb;
                    $p = "SELECT * FROM `user_d` WHERE id='$select'";
                       $execute = mysql_query($p);
if($execute === FALSE) { 
    die(mysql_error()); 
}

  while($dataQuery=mysql_fetch_array($execute)){
  $name=$dataQuery['name'];
  $email = $dataQuery['email'];
$credit=$dataQuery['CurrentCredit'];
}
         ?>
	<form method="post">

          <br><br><div class="card">
            	<div class="card-header bg-dark">
          <h1 class="text-white text-center">Update Operation</h1>
          <div >   <?php echo ErrorMessage();
             echo SuccessMessage();?></div>
           	</div><br>
           	<label>Username:</label>
           <input type="text"    name="Username" value="<?php  echo($name);  ?>"class="form-control"><br>
           <label>Email</label>
               <input type="text" name="email" value="<?php  echo($email);  ?>" class="form-control"><br>
           <label>Cedit</label>
               <input type="text" name="CurrentCredit" value="<?php  echo($credit);  ?>" class="form-control"><br>
           <button  class="btn btn-success" type="submit" name="submit">submit</button><br>
           </div>
	</form>
</div>
     
</body>
</html>