<?php

session_start();
function ErrorMessage(){
if(isset($_SESSION["ErrorMessage"])){
	$output = "<div class=\"alert alert-danger\">";
	$output.=htmlspecialchars($_SESSION["ErrorMessage"]);
	$output.="</div>";
	$_SESSION["ErrorMessage"]=null;
	return $output;
}
}

function SuccessMessage(){
if(isset($_SESSION["SuccessMessage"])){
	$output = "<div class=\"alert alert-success\">";
	$output.=htmlspecialchars($_SESSION["SuccessMessage"]);
	$output.="</div>";
	$_SESSION["SuccessMessage"]=null;
	return $output;
}
}
?>
