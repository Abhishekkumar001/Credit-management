<?php
include ("session.php"); 
include 'conn.php';
include ("function.php");
$id= $_GET['id'];
$q= "delete from user_d where id=$id";
$execute= mysql_query($q);
if($execute){
		$_SESSION["SuccessMessage"]="User Deleted successfully";
		         redirect_to("display.php");
	}else{
		$_SESSION["ErrorMessage"]="Something Went wrong. Try again! ";
		         redirect_to("display.php");
	
}

?>