<?php include ("session.php"); ?>
<?php include ("function.php"); ?>
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

  <div class="container">
    <div class="col-lg-12">
      <br>
      <br>
      <h1 class="text-warning text-center" > Display Data</h1>
      <div >   <?php echo ErrorMessage();
             echo SuccessMessage();?></div>
      <br>
      <table class="table table-striped table-hover table-bordered">
        <tr class='bg-dark text-white text-center'>
          <th>Acc.id</th>
          <th>Username</th>
          <th>Email</th>
          <th>Current Credit</th>
          <th>Update</th>
          <th>Delete</th>
          <th>View User</th>
        </tr>
<?php

        include 'conn.php';
       
                  $sql =" select * from user_d";
              $query=mysql_query($sql);
                while($result = mysql_fetch_array($query)){

                
              
?>
        <tr class="text-center">
          <td><?php echo $result['id'];?></td>
          <td><?php echo $result['name'];?></td>
          <td><?php echo $result['email'];?></td>
          <td><?php echo $result['CurrentCredit'];?></td>
          <td><button class="btn btn-success"><a href="update.php?id=<?php echo $result['id'];?>" class="text-white">update</a> </button></td>
          <td><button class="btn btn-danger"><a href="delete.php?id=<?php echo $result['id'];?>" class="text-white">Delete </a> </button></td>
           <td><button class="btn btn-primary"><a href="view.php?id=<?php echo $result['id'];?>" class="text-white">View </a> </button></td>

        </tr>
<?php
}
?>
      </table>
<button class="btn btn-primary" ><a href="insert.php" class="text-white">Add users</a></button>
    </div>
  </div>
</body>
</html> 