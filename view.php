<?php
include ("session.php"); 
include 'conn.php';
 include ("function.php"); 
if(isset($_POST['submit'])){
  $id=$_GET['id'];
  $username=mysql_real_escape_string($_POST['Username']);
  $Transfername = mysql_real_escape_string($_POST['Tname']);
  $email=$_POST['email'];
$id2=$_POST['TC'];
          $credit=$_POST['CurrentCredit'];
             $Tcredit=$_POST['TCredit'];
          $c=$credit-$Tcredit;


global $connDb ;
  $query = "select * from user_d where id=$id2";
  $execute = mysql_query($query);

  while($dataQuery=mysql_fetch_array($execute)){
$idone=$dataQuery['id'];
  $Tname = $dataQuery['name'];
  $credit1=$dataQuery['CurrentCredit'];
}
$b=$credit1+$Tcredit;

if(empty($Tcredit)){
  echo $_SESSION["ErrorMessage"]="credit don't be empty";
redirect_to("display.php");
  
}

elseif($Tcredit>$credit1){
    echo $_SESSION["ErrorMessage"]="you don't have sufficent credit";
redirect_to("display.php");
}
elseif($Tcredit<=0){
    echo $_SESSION["ErrorMessage"]="you don't have enter negative no";
redirect_to("display.php");
}

elseif($id==$id2){
 echo $_SESSION["ErrorMessage"]="credit could not be transfer to you own account";
redirect_to("display.php");


}
else{

        $sql =" update user_d set CurrentCredit='$b' where id=$id2";
        
                  if(mysql_query($sql)){
                            
                            header('location: display.php');
                  }else{
                  
}


        $sq =" update user_d set CurrentCredit='$c' where id=$id";
        
                  if(mysql_query($sq)){
                            
                           $_SESSION["SuccessMessage"]="Credit Transfer successfully";
             redirect_to("display.php");
                  }else{
                  
}
                }
}

?>



<?php include "conn.php"; ?>
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
<div class="col-lg-6 m-auto">  <?php
$sid=$_GET['id'];
  ?>
	               <form  method="post">
          <br><br>

          <div class="card">
           
            	<div class="card-header bg-dark">
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
          <h1 class="text-white text-center">Insert Operation</h1>

           	</div><br>
            <div >   <?php echo ErrorMessage();
             echo SuccessMessage();?></div>
           	<label>Username:</label>
           <input type="text"    value="<?php echo($name);?>" name="Username" class="form-control"><br>
           <label>Email:</label>
           <input type="text" value="<?php echo($email);?>" name="email" class="form-control"><br>
           <label>Total Credit:</label>
           <input type="text" value="<?php echo($credit);?>" name="CurrentCredit"class="form-control"><br>
           <label>Transfer Credit:</label>
           <input type="text" placeholder ="Credit to be Transfer" name="TCredit"class="form-control"><br>
             
           <label>Transfer To another user:</label>
       
             <select class="form-control" id="categoryselect" name="TC">


  <?php

global $connDb ;
  $query = "select * from  user_d";
  $execute = mysql_query($query);

  while($dataQuery=mysql_fetch_array($execute)){
  $id=$dataQuery["id"];
  $category = $dataQuery['name'];
  ?>
            <option><?php echo $id;?></option>
<?php }?>
                         </select>
                 <br>
                     <button class="btn btn-success" type="submit" name="submit">Transfer Credit</button><br>
           </div>
           
	</form> 
</div>
     
</body>
</html>